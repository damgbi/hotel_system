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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('external_id')->unique();
            $table->bigInteger('hotel_id');
            $table->string('name');
            $table->integer('inventory_count');
            $table->unsignedBigInteger('id_hotel');
            $table->foreign('id_hotel')->references('id')->on('hotels')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
