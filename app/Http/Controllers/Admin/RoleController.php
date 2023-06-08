<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    private $breadcrumbs, $routeIndex;

    public function __construct()
    {
        $this->breadcrumbs = [
            'Dashboard' => 'dashboard',
            'Role'   => route('role.index')
        ];
        $this->routeIndex = 'role.index';

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $roles = Role::all();

        return view('role.index', [
            'title' => ucwords('Role'),
            'breadcrumbs' => $this->breadcrumbs,
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create',[
            'title' => ucwords('create role'),
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation 
        $data = $request->validate([
            'name' => ['required'],
            'guard_name' => ['required'],
        ]);

        Role::create($data);
        return redirect()->route($this->routeIndex)->with('success', 'Added Role Succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('admin.role.edit', compact('role'));
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
        // validation role
        $data = $request->validate([
            'name' => ['required'],
            'guard_name' => ['required'],
        ]);

        Role::where('id', $id)->update($data);
        return redirect()->route('superadmin.role.index')->with('success', 'Updated Role Succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::where('id', $id)->delete();
        return redirect()->route('superadmin.role.index')->with('success', 'Deleted Role Succesfully!');
    }
}
