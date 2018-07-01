<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i < 200; $i++) {
            DB::table('users')
                ->insert([
                    'name' => $name = str_random(10),
                    'email' => $name . '@qq.com',
                    'password' => bcrypt('123456')
                ]);
        }

    }
}
