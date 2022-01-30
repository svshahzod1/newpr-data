<?php

namespace Database\Seeders;

use  Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Users = [
            [
                'name' => 'Steve Jobs',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'), // password
                'remember_token' => Str::random(10),
                'role'=>'admin'
            ],
            [
                'name' => 'Bill Gets',
                'email' => 'director@mail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'), // password
                'remember_token' => Str::random(10),
                'role'=>'director'
            ]

        ];
        DB::table('users')->insert($Users);
    }
}
