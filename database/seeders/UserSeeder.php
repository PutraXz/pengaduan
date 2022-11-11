<?php

namespace Database\Seeders;
USE Illuminate\Support\Str;

use Illuminate\Database\Seeder;
use App\Models\User;

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
            [
            'name' => 'admin test',
            'level' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('test'),
            'remember_token' => Str::random(50),
        ],
        [
            'name' => 'pimpinan',
            'level' => 'pimpinan',
            'email' => 'pimpinan@gmail.com',
            'password' => bcrypt('test'),
            'remember_token' => Str::random(50),
        ]];
        foreach($users as $user ){
            User::create($user);
        }
    }
}
