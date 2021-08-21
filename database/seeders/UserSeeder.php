<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['role_id' => 1, 'email' => 'admin@imudu.com', 'password' => Hash::make('123456789'), 'phone' => '0786065529'],
            ['role_id' => 2, 'email' => 'owner@imudu.com', 'password' => Hash::make('123456789'), 'phone' => '0620116322', 'phone_verified_at' => now(), 'email_verified_at' => now(), 'is_verified' => 1, 'is_complete' => 1],
        ];
        foreach ($users as $user){
            User::updateOrCreate(['email' => $user['email']], $user);
        }
    }
}
