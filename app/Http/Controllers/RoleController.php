<?php

namespace App\Http\Controllers;
//use App\Models\Role;
//use App\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    function show(){
        $allrole=Role::all();
        //$UserName=$alldata->input('Name');
        //return $req['Name'];
        return view("dashboard/role")->with(['allrole'=>$allrole,  'permissions' => Permission::all()]);
        //return view("dashboard/role",['allrole'=>$allrole]);
    }
    function Insert(Request $req){
        
        
        $isupdate=$req['update'];
        if($isupdate=="0"){
            $permissonid=$req['permissonlist'];
            $rolename=$req['Name'];
            $role=Role::create(['name' => $rolename]);
        foreach($permissonid as $id){
            $permission=Permission::find($id);
            $role->givePermissionTo($permission);
        }
    }
    elseif($isupdate=="1"){
        //return "role is updating";
        //remove all permission from role
        // and re recreate all role with permission i.e update
        $permissonid=$req['permissonlist'];
        $roleobj=Role::find($req['roleid']);
        $permission=Permission::All();
        //return $roleobj;
        $roleobj->revokePermissionTo($permission);
        foreach($permissonid as $id){
            $permissionob=Permission::find($id);
            $roleobj->givePermissionTo($permissionob);
        }

    }
        
        //foreach($permisson as $pd){//
            //$role->givePermissionTo($pd);
          //  return $pd;
        //}
        //$ROLE = new Role; 
        //$ROLE->name = $rolename;//$request->name; 
        //$ROLE->save();
        return redirect('role');
    }

    function edit(Request $req){
        $roleobj = Role::find($req['id']);
        $role_per_Permission = $roleobj->getAllPermissions();
        // dd($role_per_Permission);s
        $permissions = Permission::get();
        //return $role_per_Permission;
        $all_roles_except_a_and_b = Permission::whereNotIn('name', $role_per_Permission)->get();
        //return $all_roles_except_a_and_b;

        return view("dashboard/roleedit")->with(['allrole'=>Role::find($req['id']), 'permissions' => $permissions,'all_roles_except_a_and_b' => $all_roles_except_a_and_b, 'role_per_Permission'=>$role_per_Permission]);
        

    }

    function Delete(Request $req){        
        
        $role=Role::find($req['id']);
        $permission=Permission::All();
        $role->revokePermissionTo($permission);

        $RoleObj = Role::find($req['id']);
        $RoleObj->delete();
        return redirect('role');
        //$permission->removeRole($role);

    }
}
