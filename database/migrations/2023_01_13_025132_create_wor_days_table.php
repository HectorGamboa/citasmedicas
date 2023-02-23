<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wor_days', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('day');
            $table->boolean('active');
            $table->time('moning_start');
            $table->time('moning_end');
            $table->time('afternoon_start');
            $table->time('afternoon_end');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('wor_days');
    }
}
