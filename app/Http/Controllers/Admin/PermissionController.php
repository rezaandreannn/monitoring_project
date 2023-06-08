<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
 
         $permissions = Permission::where('type', 'module')->get();
 
         return view('admin.permission.index', compact('permissions'));
     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         return view('admin.permission.create');
     }
 
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         // validation permission
         $data = $request->validate([
             'name' => ['required', 'unique:permissions,name'],
         ]);
         $url = str_replace(' ', '', \strtolower($data['name']));

         $data['url'] = $url.'.dashboard';
         $data['guard_name'] = 'web';
         $data['type'] = 'module';
         $data['created_by'] = auth()->user()->name;
 
         Permission::create($data);
         return redirect()->route('superadmin.permission.index')->with('success', 'Added Permission Module Succesfully!');
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
         $permission = Permission::findOrFail($id);
         return view('admin.permission.edit', compact('permission'));
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
         // validation permission
         $data = $request->validate([
             'name' => ['required'],
             'guard_name' => ['required'],
         ]);
         $data['updated_by'] = auth()->user()->name;
 
         Permission::where('id', $id)->update($data);
         return redirect()->route('superadmin.permission.index')->with('success', 'Updated Permission Succesfully!');
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         Permission::where('id', $id)->delete();
         return redirect()->route('superadmin.permission.index')->with('success', 'Deleted Permission Succesfully!');
     }
}
