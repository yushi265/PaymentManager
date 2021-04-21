<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'ゆうき',
            'email' => 'yuki@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => 'あすか',
            'email' => 'asuka@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        DB::table('events')->insert([
            'name' => 'シャンゴ',
        ]);

        DB::table('events')->insert([
            'name' => 'はらっぱ',
        ]);

        DB::table('payments')->insert([
            'event_id' => 1,
            'payer_id' => 1,
            'price' => 1000,
        ]);

        DB::table('payments')->insert([
            'event_id' => 2,
            'payer_id' => 2,
            'price' => 2000,
        ]);
    }
}
