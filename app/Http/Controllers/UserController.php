<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function show(){
      $data=User::all();
      return view("dashboard/user")->with(['roledata' => Role::all(),  'data' => $data]);
      //return view("dashboard/user",['data'=>$data,'roledata'=>Role::all()]);
    }

    function userLogin(){
        return view('home/userlogin');
    }

    function userRegister(){
        return view('home/userregister');
    }

    function Insert(Request $req){
        $name=$req['Name']; 
        $email=$req['email'];  
        if(isset($req['role'])){   
            $role=$req['role'];
        }
        else{
            $role="null";
        }
        $password=$req['password'];  
        $action=$req['update'];
        if($action=="0"){      
            //this is for inserting
            //auth()->User()->assignRole($role);
            $USER = new User; 
            $USER->name = $name;//$request->name; 
            $USER->email=$email;
            $USER->password=Hash::make($password);
            $USER->save();
            $USER->assignRole($role);     
            return redirect('user');   
        }
        elseif($action=="1"){
            //this is for updating
            $USER = USER::find($req['id']);
            $USER->name = $name;//$request->name; 
            $USER->email=$email;
            if(strlen($password)>=4){
                $USER->password=Hash::make($password);
            }
            $USER->save();
            $userroleId=$USER->getRoleNames();
            if($role!="null"){
                if(sizeof($userroleId)!=0){
                     $USER->removeRole($userroleId[0]);//generating error    
                } 
                $USER->assignRole($role);
            }
            return redirect('user');   
        }
        
    }
  
    function Delete(Request $req){
        $UserObj = User::find($req['id']);
        $UserObj->delete();
        return redirect('user');
    }
    function UserEdit(Request $req){
        $userId=$req['id'];
        $userdetail=$user=User::find($userId);
        $role=$user->getRoleNames();
        if(sizeof($role)==0){
            $role[0]="Null";
        }
       return view("dashboard/useredit")->with(['userdata' => $userdetail,'roles'=>Role::all(),'role'=>$role]);
    }
}
