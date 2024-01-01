<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('invoice_id')->unsigned();
            $table->bigInteger('service_id')->unsigned();
            $table->float('amount_service');
            $table->bigInteger('room_id')->unsigned();
            $table->float('amount_room');
            $table->bigInteger('room_type_id')->unsigned();
            $table->float('amount_room_type');
            $table->timestamps();

            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('room_type_id')->references('id')->on('room_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_details');
    }
};
