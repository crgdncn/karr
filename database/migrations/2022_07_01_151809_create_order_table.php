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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->uuid('order_number');
            $table->foreignId('key_id');
            $table->foreignId('technician_id');
            $table->foreignId('vehicle_id');
            $table->timestamps();


            $table->foreign('key_id')->references('id')->on('keys');
            $table->foreign('technician_id')->references('id')->on('technicians');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
};
