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
        Schema::create('staff_availability', function (Blueprint $table) {
            $table->id('availability_id');
            $table->foreignId('staff_id')->references('staff_id')->on('staff')->cascadeOnUpdate()->cascadeOnDelete();
            $table->date('available_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('status' ,['available', 'unavailable', 'cancelled'])->default('available');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_availability');
    }
};
