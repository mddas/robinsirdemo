<?php

namespace App\Http\Controllers;
//use App\Models\Role;
//use App\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Http\Request;

class PermissonController extends Controller
{
    function show(){
        $allpermisson=Permission::all();
        return view("dashboard/permisson",["permissondata"=>$allpermisson]);
    }
    function Insert(Request $req){
        if($req['update']=='0'){
            $permissonName=$req['Name'];
            $permission = Permission::create(['name' => $permissonName]);
            //$PERMISSON = new Permission; 
            //$PERMISSON->name = $permissonName;//$request->name; 
            //$PERMISSON->save();
            return redirect('permisson');
        }
        elseif($req['update']=='1')
        {
            $permissionobj=Permission::find($req['permissonid']);
            //return $req['permissonid'];
            $permissionobj->name=$req['Name'];
            $permissionobj->save();
            return redirect('permisson');

        }

    }
    
    function Edit(Request $req){
        return view("dashboard/permissonedit")->with(['id'=>$req['id'],  'name' => $req['name']]);// , ['id'=>$req['id'],'name'=>$req['name']]);

    }

    function Delete(Request $req){
        $permission=Permission::find($req['id']);
        //return $permission;
        $role=Role::all();
        foreach($role as $ob){
           $id=$ob['id'];
           $roleobj=Role::find($id);
           $permission->removeRole($roleobj);
        }    
        $permissionDeleteObj = Permission::find($req['id']);
        $permissionDeleteObj->delete();
        return redirect('permisson');
    }
}
