<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassengerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passenger', function (Blueprint $table) {
            $table->bigIncrements('passenger_id');
            $table->string('passenger_lname');
            $table->string('passenger_fname');
            $table->string('passenger_address');
            $table->string('passenger_contact');
            $table->string('passenger_bus_id');
            $table->date('passenger_created_date');
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
        Schema::dropIfExists('passenger');
    }
}
