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
        Schema::create('key_vehicle', function (Blueprint $table) {
            $table->foreignId('key_id')->nullable(false);
            $table->foreignId('vehicle_id')->nullable(false);

            $table->foreign('key_id')->references('id')->on('keys');
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
        Schema::dropIfExists('key_vehicle');
    }
};
