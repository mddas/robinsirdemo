<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userObj=new User;
        $userObj->name="Manoj das";
        $userObj->email="mddasgudiya@gmail.com";
        $userObj->password=Hash::make("12345678");
        $userObj->save();
    }
}
