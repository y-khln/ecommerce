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
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id_employee');
            $table->string('name');
            $table->string('surname');
            $table->date('date_of_birth');
            $table->string('phone')->unique();
            $table->string('post');
            $table->bigInteger('service_group')->unsigned();
            $table->timestamps();

            $table->foreign('service_group')->references('id_group')->on('service_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
