<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'Admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Client', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Manager', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Head-manager', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
        DB::table('roles')->insert($roles);
    }
}
