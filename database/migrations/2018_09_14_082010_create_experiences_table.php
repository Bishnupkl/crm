<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name_of_employer')->nullable();
            $table->string('duties')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();

            $table->boolean('is_active')->default(true);
            $table->string('remarks')->nullable();

            $table->string('inquiry_token')->index();
            $table->foreign('inquiry_token')->references('token')->on('inquiries');

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
        Schema::dropIfExists('experiences');
    }
}
