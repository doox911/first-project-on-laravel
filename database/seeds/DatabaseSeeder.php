<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TaskPriority::class);
        $this->call(TaskStatus::class);
        $this->call(CreateUser::class);
    }
}
