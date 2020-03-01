<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');
            $table->string('position');
            $table->string('branch');

            $table->timestamp('last_login');
            $table->string('token')->nullable();

            $table->morphs('morph');

            $table->boolean('email_verified')->default(false);
            $table->boolean('mobile_verified')->default(false);
            $table->boolean('is_active')->default(true);

            $table->string('avatar')->nullable();
            $table->string('thumbnail')->nullable();

            $table->string('verification_token')->nullable();

            $table->string('token_created_at')->nullable();

            $table->boolean('is_verified')->default(false);

            $table->string('remarks')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
