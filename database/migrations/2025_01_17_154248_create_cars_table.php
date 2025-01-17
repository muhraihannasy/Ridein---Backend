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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_car_id');
            $table->foreignId('model_car_id');
            $table->uuid('uuid');
            $table->string('name', 100);
            $table->string('plate_number', 100);
            $table->date('year');
            $table->integer('price_per_day')->default(0);
            $table->integer('unit_avaible')->default(0);
            $table->enum('status', ['available', 'unavailable'])->default('available');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
