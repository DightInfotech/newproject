ars<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user =  \App\Models\User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'user_name' => 'super admin',
            'email' => 'superadmin@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('secret'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $user->roles()->attach(1);
        $this->command->info('Admin has been created with Email: superadmin@gmail.com and Password: secret');
    }
}
