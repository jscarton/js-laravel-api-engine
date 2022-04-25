<?php

namespace Database\Seeders;

use App\Models\Role;

class RoleTableSeeder extends BaseSeeder
{
    public function runAlways()
    {
        Role::firstOrCreate([
            'name' => 'system-admin',
            'description' => 'System Administrator',
        ]);

        Role::firstOrCreate([
            'name' => 'project-owner',
            'description' => 'Project Owner',
        ]);

		Role::firstOrCreate([
            'name' => 'project-admin',
            'description' => 'Project Admin',
        ]);

		Role::firstOrCreate([
            'name' => 'project-user',
            'description' => 'Project User',
        ]);
    }
}
