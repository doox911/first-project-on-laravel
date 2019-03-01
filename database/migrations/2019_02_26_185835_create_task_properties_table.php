<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status');
            $table->integer('setter');
            $table->integer('responsible');
            $table->integer('priorities');
            $table->text('title');
            $table->text('body')->nullable();
            $table->string('deadline');
            $table->string('factline')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_properties');
    }
}
