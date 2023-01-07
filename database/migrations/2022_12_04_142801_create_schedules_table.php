<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigInteger('id_employee')->unsigned();
            $table->foreign('id_employee')->references('id_employee')->on('employees')->onDelete('cascade');
            $table->text('time');
//            $table->boolean('time_10_00');
//            $table->boolean('time_11_00');
//            $table->boolean('time_12_00');
//            $table->boolean('time_13_00');
//            $table->boolean('time_14_00');
//            $table->boolean('time_15_00');
//            $table->boolean('time_16_00');
//            $table->boolean('time_17_00');
//            $table->boolean('time_18_00');
            $table->date('date');
            $table->timestamps();

            $table->foreign('id_employee')->references('id_employee')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
