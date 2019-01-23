<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BackcallsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 100; $i++) {
            DB::table('backcalls')->insert([
                'phone' => '8' . mt_rand(100, 999) . mt_rand(100, 999) . mt_rand(1000, 9999),
                'name' => 'Иван ' . mt_rand(1,9),
                'status' => false,
                'created_at' => time(),
                'updated_at' => time()
            ]);
        }
    }
}
