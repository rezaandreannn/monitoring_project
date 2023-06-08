<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;


class UserController extends Controller
{
    private $breadcrumbs, $routeIndex;

    public function __construct()
    {
        $this->breadcrumbs = [
            'Dashboard' => 'dashboard',
            'User'   => route('user.index')
        ];
        $this->routeIndex = 'user.index';

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $breadcrumbs = [
            'Dashboard' => 'ee',
            'User' => 'ee'
        ];

        $users = User::all();
        return view('user.index', compact('users', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255', 'regex:/^[^\s]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'string','unique:users,phone', 'regex:/^\+?([0-9]{8,15})$/'],
            'no_npp' => ['nullable', 'numeric']

        ], [
            'name.regex' => 'name cannot contain spaces.',
            'phone.regex' => 'The phone number must be a number and be 8-15 characters long.'
        ]);

        // cek apakan no npp ada isinya
        if (!empty($data['no_npp'])) {
            $request->validate([
                'no_npp' => 'regex:/^[0-9]{15}$/'
                ]);
        }

        // Mengubah format nomor telepon dengan menambahkan kode negara +62
        $phone = $request->input('phone');
        if (substr($phone, 0, 1) === '0') {
            $phone = '+62' . substr($phone, 1);
        } elseif (substr($phone, 0, 1) !== '+') {
            $phone = '+62' . $phone;
        }

        

        $user = User::create([
            'name' => $data['name'],
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'password' => Hash::make($request->password),
            'phone' => $phone,
            'jabatan' => $request->jabatan,
            'no_npp' => $request->no_npp,
            'domisili_pabrik' => $request->domisili_pabrik,
            'created_by' => auth()->user()->name
        ]);

        $user->assignRole('user');

        return redirect()->route('superadmin.user.index')->with('success', 'Created User Succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('permissions')->find($id);
        $roles = Role::all();
        // $permissions = Permission::all();

        $modulePermissions = Permission::where('type', 'module')->get();
        $pabrikPermissions = Permission::where('type', 'pabrik')->get();

        // dd($permissionNames);
        return view('admin.user.detail', compact('user', 'modulePermissions', 'pabrikPermissions','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit',[
            'title' => ucwords('edit user'),
            'breadcrumbs' => $this->breadcrumbs,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255', 'regex:/^[^\s]+$/'],
            'phone' => ['nullable', 'string', 'regex:/^\+?([0-9]{8,15})$/'],
            'no_npp' => ['nullable', 'numeric']

        ], [
            'name.regex' => 'name cannot contain spaces.',
            'phone.regex' => 'The phone number must be a number and be 8-15 characters long.'
        ]);

         // Mengubah format nomor telepon dengan menambahkan kode negara +62
         $phone = $request->input('phone');
         if (substr($phone, 0, 1) === '0') {
             $phone = '+62' . substr($phone, 1);
         } elseif (substr($phone, 0, 1) !== '+') {
             $phone = '+62' . $phone;
         }

        $user = User::findOrFail($id);

        // cek apakan no npp ada isinya
        if (!empty($data['no_npp'])) {
            $request->validate([
                'no_npp' => 'regex:/^[0-9]{15}$/'
                ]);
        }

        // cek apakah no telpon berubah
        if (!empty($data['phone']) && $data['phone'] !== substr($user->phone, 3)) {
        //    jika berubah tambahkan valiadasi
            $request->validate([
                'phone' => 'unique:users,phone'
                ]);
                
            }
        
            $data['phone'] = $phone;
            $data['jabatan'] = $request->jabatan;
            $data['domisili_pabrik'] = $request->domisili_pabrik;
            $data['updated_by'] = auth()->user()->name;

           $user->update($data);

           return redirect()->route('superadmin.user.index')->with('success', 'Updated User Succesfully!');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('superadmin.user.index')->with('success', 'Deleted User Succesfully!');
    }

    public function managePermission(Request $request){

        // ambil input post
        $userId = $request->input('userId');
        $permissionId = $request->input('permissionId');
        $action = $request->input('action');

        $user = User::find($userId);
        $permission = Permission::find($permissionId);

        if($action == 'insert'){
            $user->givePermissionTo($permission);
            $message = 'Created permission succesfully';
            
        }else{
            $user->revokePermissionTo($permission);
            $message = 'Remove permission succesfully';
        }

        return response()->json(['success' => $message]);

    }

    public function manageRole(Request $request){

        // ambil input post
        $userId = $request->input('userId');
        $roleId = $request->input('roleId');
        $action = $request->input('action');

        $user = User::find($userId);
        $role = Role::find($roleId);

        if($action == 'insert'){
            $user->assignRole($role);
            $message = 'Created Role succesfully';
            
        }else{
            $user->removeRole($role);
            $message = 'Remove Role succesfully';
        }

        return response()->json(['success' => $message]);

    }
}
