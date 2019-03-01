<?php

use Illuminate\Database\Seeder;

class TaskPriority extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_priorities')->insert([
            'name' => 'Не срочно',
        ]);
        DB::table('task_priorities')->insert([
            'name' => 'Срочно',
        ]);
        DB::table('task_priorities')->insert([
            'name' => 'Не важно',
        ]);
        DB::table('task_priorities')->insert([
            'name' => 'Важно',
        ]);
    }
}
