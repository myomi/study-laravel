<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        $users = [
            [
                'name' => 'user01',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'user02',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
            ]
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
