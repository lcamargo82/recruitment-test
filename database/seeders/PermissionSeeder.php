<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);

        DB::table('permissions')->insert([
            'name' => 'User',
            'guard_name' => 'web',
        ]);
    }
}
