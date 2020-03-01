<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnglishProficiencyTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('english_proficiency_tests', function (Blueprint $table) {
            $table->increments('id');

            $table->string('test_type')->nullable();
            $table->string('is_taken')->nullable();
            $table->string('test_date')->nullable();
            $table->string('listening')->nullable();
            $table->string('reading')->nullable();
            $table->string('speaking')->nullable();
            $table->string('writing')->nullable();
            $table->string('overall')->nullable();
            $table->string('other_test_attain')->nullable();
            $table->string('preparation_classes')->nullable();
            $table->string('study_center')->nullable();

            $table->boolean('is_active')->default(true);
            $table->string('remarks')->nullable();

            $table->string('inquiry_token')->index();
            $table->foreign('inquiry_token')->references('token')->on('inquiries');

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
        Schema::dropIfExists('english_proficiency_tests');
    }
}
