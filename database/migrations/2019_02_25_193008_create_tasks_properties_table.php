<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks_properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('statusId');
            // $table->foreign('statusId')->references('id')->on('task_status')->onDelete('noaction');
            $table->integer('userCreateId');
            // $table->foreign('userCreateId')->references('id')->on('users')->onDelete('noaction');
            $table->integer('userSetId');
            // $table->foreign('userCreateId')->references('id')->on('users')->onDelete('noaction');
            $table->integer('priorityId');
            // $table->foreign('priorityId')->references('id')->on('task_ptiority')->onDelete('noaction');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks_properties');
    }
}
