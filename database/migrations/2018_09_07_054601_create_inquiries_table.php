<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->string('token')->unique();
            $table->increments('id');

            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('mobile')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('temporary_address')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('bloodgroup')->nullable();
            $table->string('landline')->nullable();
            $table->string('nationality')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('marriage_date')->nullable();
            $table->string('how_did_you_know_about_us')->nullable();

            $table->string('thumbnails')->nullable();

            $table->boolean('is_verified_email')->default(false);
            $table->string('email_verification_token')->nullable();

            $table->boolean('is_verified_mobile')->default(false);
            $table->string('mobile_verification_token')->nullable();
            $table->string('status')->default('Inquiry');
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('inquiries');
    }
}
