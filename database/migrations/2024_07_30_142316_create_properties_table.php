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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name');
            $table->string(column: 'featured-image');
            $table->unsignedBigInteger(column: 'price');
            $table->unsignedBigInteger(column: 'sale')->default(value: 1) -> comment(comment: '0=rent,1=sell');
            $table->unsignedBigInteger(column: 'type')->default(value: 1) -> comment(comment: '0=land,1=apertment,2=villa,');
            $table -> string(column: 'bedrooms') -> nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
