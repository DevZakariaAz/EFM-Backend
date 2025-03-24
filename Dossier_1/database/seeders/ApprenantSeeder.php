<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApprenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('apprenants')->insert([
            [
                'name'       => 'Alice',
                'is_active'  => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Bob',
                'is_active'  => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Charlie',
                'is_active'  => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'David',
                'is_active'  => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Eve',
                'is_active'  => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Frank',
                'is_active'  => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'George',
                'is_active'  => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
