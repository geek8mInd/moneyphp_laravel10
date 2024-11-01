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
        Schema::create('countrycurrency', function (Blueprint $table) {
            $table->id();
            $table->string('currency_rate', 50);

            $table->foreignId('currency_id')->constrained()->restrictOnDelete();
            $table->foreignId('country_id')->constrained()->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countrycurrency');
    }
};
