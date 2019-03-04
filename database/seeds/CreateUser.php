<?php

use Illuminate\Database\Seeder;

class CreateUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Андрей',
            'email' => 'doox911@yandex.ru',
            'password' => Hash::make('1234'),
        ]);
        DB::table('users')->insert([
            'name' => 'Николай',
            'email' => 'test1@yandex.ru',
            'password' => Hash::make('1234'),
        ]);
        DB::table('users')->insert([
            'name' => 'Иван',
            'email' => 'test2@yandex.ru',
            'password' => Hash::make('1234'),
        ]);
    }
}
