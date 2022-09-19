<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'name' => "Andrew",
                'role_id' => 1,
                'email' => 'andrew@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('andrew@gmail.com'),
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => "Ivan",
                'role_id' => 2,
                'email' => 'ivan@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('ivan@gmail.com'),
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => "Alex",
                'role_id' => 3,
                'email' => 'alex@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('alex@gmail.com'),
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => "Sergey",
                'role_id' => 4,
                'email' => 'sergey@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('sergey@gmail.com'),
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => "Anton",
                'role_id' => 2,
                'email' => 'anton@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('anton@gmail.com'),
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now(),
            ],
        ];
        DB::table('users')->insert($users);
    }
}
