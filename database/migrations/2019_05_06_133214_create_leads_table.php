<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('host')->default('');
            $table->integer('phone_id')->nullable();
            $table->integer('type')->default('0');
            $table->integer('form_type')->default('0');
            $table->string('tduid')->default('');
            $table->string('pay_id')->default('0');
            $table->string('price')->default('0');
            $table->integer('region_id')->default('0');
            $table->string('name')->default('');
            $table->string('phone')->nullable();
            $table->string('clear_phone')->nullable();
            $table->string('city')->default('');
            $table->integer('vendor')->default('0');
            $table->text('question')->nullable();
            $table->text('original_msg')->nullable();
            $table->integer('from_id');
            $table->integer('to_id')->default('0');
            $table->integer('moderator_id')->default('0');
            $table->integer('stat_id')->default('0');
            $table->timestamps();
            $table->timestamp('accepted_at')->nullable();
            $table->text('remove_text');
            $table->string('remote_id')->default('0');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
