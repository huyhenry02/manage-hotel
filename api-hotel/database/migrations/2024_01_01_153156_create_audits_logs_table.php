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
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->string('model_type',255);
            $table->bigInteger('model_id')->unsigned();
            $table->enum('action',['create','update','delete']);
            $table->json('old_data')->nullable();
            $table->json('new_data')->nullable();
            $table->bigInteger('employee_id')->unsigned();
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};
