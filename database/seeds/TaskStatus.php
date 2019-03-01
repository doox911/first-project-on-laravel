<?php

use Illuminate\Database\Seeder;

class TaskStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_statuses')->insert([
            'name' => 'Не просмотрено',
        ]);
        DB::table('task_statuses')->insert([
            'name' => 'Просмотрено',
        ]);
        DB::table('task_statuses')->insert([
            'name' => 'В работе',
        ]);
        DB::table('task_statuses')->insert([
            'name' => 'Отложено',
        ]);
        DB::table('task_statuses')->insert([
            'name' => 'Не выполнено',
        ]);
        DB::table('task_statuses')->insert([
            'name' => 'Выполнено',
        ]);
        DB::table('task_statuses')->insert([
            'name' => 'Отменена',
        ]);
    }
}
