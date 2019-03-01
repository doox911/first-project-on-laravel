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
            'password' => Hash::make('Loko4273'),
        ]);
    }
}
