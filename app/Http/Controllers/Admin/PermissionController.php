<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
class PermissionController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['role:admin']);
    }
     // Permission
     public function showListPermission(){
        $permissions = Permission::orderBy('id','desc')->paginate(5);

        return view('admin.permissions.list',compact(['permissions']));
    }

    public function createPermission(){
        return view('admin.permissions.create');
    }
    public function storePermission(Request $request ){

        $data =$request->only('name');

        ;
        Permission::create(['name'=>implode('',$data)]);


        return redirect()->route('admin.permissions.list')
        ->with('success','Permission created successfully!');
    }

    public function editPermission($id){
        $permission = Permission::findById($id);
        return view('admin.permissions.edit',compact('permission'))
        ->with('success','');
    }

    public function updatePermission(Request $request ,$id){
        $permission = Permission::find($id);
        $data = $request->only('name');
        $permission->update($data);

        return redirect()->route('admin.permissions.list');
    }

    public function deletePermission($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return redirect()->route('admin.permission.list');
    }
}
