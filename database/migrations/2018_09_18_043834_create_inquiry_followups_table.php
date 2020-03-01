<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInquiryFollowupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiry_followups', function (Blueprint $table) {
            $table->increments('id');

            $table->string('inquiry_token')->index();
            $table->foreign('inquiry_token')->references('token')->on('inquiries');

            $table->string('date')->nullable();
            $table->string('reasons')->nullable();
            $table->string('status')->default('Not visited');
            $table->string('results')->nullable();
            $table->boolean('is_active')->default(1);

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
        Schema::dropIfExists('inquiry_followups');
    }
}
