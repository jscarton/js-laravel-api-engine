<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;



class UserStorySeeder extends BaseSeeder
{    
    public function runAlways()
    {
		$ADMIN_CREDENTIALS = [
			'name' => env('SYSADMIN_USER_NAME'),
			'email' => env('SYSADMIN_EMAIL_ADDRESS'),
			'password' => Str::random(64)
		];

        // Grab all roles for reference
        $roles = Role::all();

        // Create an admin user
        User::firstOrCreate([
            'name'         => $ADMIN_CREDENTIALS['name'],
            'email'        => $ADMIN_CREDENTIALS['email'],
            'primary_role' => $roles->where('name', 'system-admin')->first()->role_id,
			'password'	   => $ADMIN_CREDENTIALS['password'],
			'email_verified_at' => now(),
			'remember_token' => Str::random(10)
        ]);

		$this->command->info('SYSADMIN User created, please take note of the random password, you won\'t see it again!');
		$this->command->info('SYSADMIN NAME:'.$ADMIN_CREDENTIALS['name']);
		$this->command->info('SYSADMIN EMAIL ADDRESS:'.$ADMIN_CREDENTIALS['email']);
		$this->command->info('SYSADMIN PASSWORD:'.$ADMIN_CREDENTIALS['password']);
    }
}
