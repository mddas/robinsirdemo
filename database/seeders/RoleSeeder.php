<?php

namespace Database\Seeders;
use App\Models\Role;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userObj=new Role;
        $userObj->name="admin";
        $userObj->guard_name="web";
        $userObj->save();

        //Role has Permission
            // $permission=Permission::find($id);
            //$role->givePermissionTo($permission);
    }
}
