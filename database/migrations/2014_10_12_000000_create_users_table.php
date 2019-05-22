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
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('fullname');
            $table->string('password');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('active')->default('1');
            $table->string('block')->default('0');
            $table->string('drop_limit')->default('0');
            $table->string('api_address')->nullable();
            $table->string('api_parser')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->string('deleted_at')->nullable();
            $table->string('price')->default('0');
            $table->string('factor')->nullable();
            $table->string('Limit')->default('0');
            $table->string('api_key_in')->default('0');
            $table->string('big_media_token')->nullable();
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
