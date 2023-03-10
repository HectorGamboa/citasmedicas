<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string("description");
        $table->date("scheduled_date");
           
        $table->time("scheduled_time");
        $table->string("type");
        //doctor
        $table->unsignedBigInteger('doctor_id');
        $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
        //specialidad
        $table->unsignedBigInteger('specialty_id');
        $table->foreign('specialty_id')->references('id')->on('specialties')->onDelete('cascade');
        
        //paciente
        $table->unsignedBigInteger('patient_id');
        $table->foreign('patient_id')->references('id')->on('specialties')->onDelete('cascade');
       

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
        Schema::dropIfExists('appointments');
    }
}
