<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class RoleController extends Controller
{

    public function __construct()
    {
        // $this->middleware(['role:admin']);
    }
    // Roles
    /*
    $user->givePermissionTo($permission) : assign permiss to user
    */
    public function showListRole(){
        $roles=  Role::paginate(5);

        return view('admin.roles.list',compact(['roles']));
    }

    public function createRole(){

        return view('admin.roles.create');
    }

    public function storeRole(Request $request){
        $data =$request->only('name');

        // DB::enableQueryLog();
        Role::create(['name'=>implode('',$data)]);
        // dd(DB::getQueryLog());
        return redirect()->route('admin.roles.list');
    }

    public function editRole($id){
        $role = Role::findById($id);
        return view('admin.roles.edit',compact('role'));
    }

    public function updateRole(Request $request ,$id){
        $role = Role::find($id);
        $data = $request->only('name');
        $role->update($data);

        return redirect()->route('admin.roles.list');
    }

    public function deleteRole($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('admin.roles.list');
    }

    public function showAssign($id){
        $role = Role::with('permissions')->find($id);
        $permissions = Permission::all();

        return view('admin.roles.assignPermission',compact('role','permissions'));
    }

    public function assignPermission(Request $request,$id){

        $role = Role::with('permissions')->find($id);
        $arrayPermission = $role->getPermissionNames()->toArray();
        if(empty($request->only('permissions'))){
            foreach ($arrayPermission as $permission) {
                $role->revokePermissionTo($permission);
            }
        }else{
            foreach ($request->only('permissions') as $permission) {

                $role->syncPermissions($permission);
            }
        }

        return redirect()->route('admin.roles.list');
    }

    public function viewDetail(Request $request,$id){
        if($request->ajax()){
            $roles = Role::find($id);

            $html = view('admin.components.role',compact(['roles']))->render();
            // foreach($orders as $order){
            //     dd($order->products->toArray());
            // }

            return response()->json($html);
        }
    }

    public function test(){
        // $user = User::find(1);
        // dd($user);
        // $user->assignRole('admin');
        // dd('no hope');

    }
}


