<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficeCheckInBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_check_in_branches', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('office_check_in_id')->unsigned();
            $table->foreign('office_check_in_id')->references('id')->on('office_check_ins');

            $table->integer('office_id')->unsigned();
            $table->foreign('office_id')->references('id')->on('offices');

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
        Schema::dropIfExists('office_check_in_branches');
    }
}
