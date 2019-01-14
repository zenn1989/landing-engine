<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'zenn@ffcms.org',
            'name' => 'Pyatinskiy M',
            'password' => password_hash('admin', PASSWORD_DEFAULT)
        ]);
    }
}
