<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservation_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservation_id');
            $table->unsignedBigInteger('room_type_id');
            $table->float('amount_room_type');
            $table->unsignedBigInteger('room_id');
            $table->float('amount_room');
            $table->timestamps();

            $table->foreign('reservation_id')->references('id')->on('reservations');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('room_type_id')->references('id')->on('room_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_details');
    }
};
