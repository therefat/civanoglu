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
            $table->string('name_tr');
            $table->string(column: 'featured_image');
            $table->unsignedBigInteger(column: 'location_id');
            $table->unsignedBigInteger(column: 'price');
            $table->unsignedBigInteger(column: 'sale')->default(value: 1) -> comment(comment: '0=rent,1=sell');
            $table->unsignedBigInteger(column: 'type')->default(value: 1) -> comment(comment: '0=land,1=apertment,2=villa,');
//            $table -> unsignedBigInteger(column: 'bedrooms') -> nullable();
            $table->string('bedrooms')->nullable();
            $table -> unsignedBigInteger(column: 'bathrooms') -> nullable();
            $table -> unsignedBigInteger(column: 'net_sqr') -> nullable();
            $table->unsignedBigInteger(column: 'gress_sqrt') -> nullable();
            $table->string(column: 'overview');
            $table->string('overview_tr');
            $table->unsignedBigInteger(column: 'pool')->nullable()->comment(comment:'0=no,1=privet,2=public,3=both');
            $table->longText(column: 'why_buy')->nullable();
            $table->longText(column: 'why_buy_tr')->nullable();
            $table->longText(column: 'description');
            $table->longText('description_tr');
            $table->timestamps();
//            $table->foreign(columns: 'featured-media-id')->references('id')->on('media');
            $table->foreign(columns: 'location_id')->references('id')->on('locations');
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
