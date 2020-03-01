<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->string('related_to');

            $table->integer('assignee')->unsigned();
            $table->foreign('assignee')->references('id')->on('users');

            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');

            $table->morphs('morph');

            $table->date('due_date');
            $table->string('files')->nullable();
            $table->boolean('is_completed')->default(0);
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
