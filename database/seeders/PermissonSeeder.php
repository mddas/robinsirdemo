<?php

namespace Database\Seeders;
use App\Models\Permission;

use Illuminate\Database\Seeder;

class PermissonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userObj=new Permission;
        $userObj->name="creat";
        $userObj->guard_name="web";
        $userObj->save();
    }
}
