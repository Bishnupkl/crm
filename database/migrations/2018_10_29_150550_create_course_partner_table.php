<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursePartnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_partner', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses');

            $table->integer('partner_id')->unsigned();
            $table->foreign('partner_id')->references('id')->on('partners');

            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('course_partner');
    }
}
