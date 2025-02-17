<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

    class UserTableSeeder extends Seeder
    {
    
        public function run()
        {
            $user = new User;
            $user->full_name = 'Samuel Jackson';
            $user->email = 'Alvin.alucar@gmail.com';
            $user->password = bcrypt('hola1234.');
            $user->save();
            $user->roles()->attach(Role::where('name', 'user')->first());
    
            $admin = new User;
            $admin->full_name = 'Aaron Montana';
            $admin->email = 'tupsicologiavirtual.777@gmail.com';
            $admin->password = bcrypt('hola1234.');
            $admin->save();
            $admin->roles()->attach(Role::where('name', 'admin')->first());
        }
    }
