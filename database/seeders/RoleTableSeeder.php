<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    public function run()
    {
        $role_regular_user = new Role;
        $role_regular_user->name = 'user';
        $role_regular_user->description = 'A regular user';
        $role_regular_user->save();

        $role_regular_user = new Role;
        $role_regular_user->name = 'publicador';
        $role_regular_user->description = 'A regular user';
        $role_regular_user->save();

        $role_admin_user = new Role;
        $role_admin_user->name = 'admin';
        $role_admin_user->description = 'An admin user';
        $role_admin_user->save();
    }
}
