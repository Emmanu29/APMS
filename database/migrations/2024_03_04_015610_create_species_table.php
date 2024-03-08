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
        Schema::create('species', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('breed');
            $table->integer('heartRateLowAlarm');
            $table->integer('heartRateHighAlarm');
            $table->integer('respiratoryRateLowAlarm');
            $table->integer('respiratoryRateHighAlarm');
            $table->decimal('coreTempLowAlarm', 8, 2);
            $table->decimal('coreTempHighAlarm', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('species');
    }
};
