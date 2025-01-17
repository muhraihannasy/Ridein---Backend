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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('car_id');
            $table->foreignId('customer_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('total_amount');
            $table->enum('status', ['pending', 'approved', 'rejected', 'in-use', 'completed'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
