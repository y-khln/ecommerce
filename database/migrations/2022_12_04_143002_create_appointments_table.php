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
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id_appointment');
            $table->biginteger('id_master')->unsigned();
            $table->biginteger('id_service')->unsigned();
            $table->string('client_name');
            $table->string('client_phone');
            $table->string('time');
            $table->date('date');
            $table->timestamps();

            $table->foreign('id_master')->references('id_employee')->on('employees');
            $table->foreign('id_service')->references('id_service')->on('prices');
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
};
