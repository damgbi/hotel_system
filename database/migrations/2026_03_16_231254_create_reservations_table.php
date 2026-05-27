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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('external_id');
            $table->foreignId('hotel_id')->constrained()->onDelete('cascade');
            $table->foreignId('room_id')->constrained()->onDelete('cascade');
            $table->string('customer_first_name');
            $table->string('customer_last_name');
            $table->date('arrival_date');
            $table->date('departure_date');
            $table->decimal('total_price', 10, 2);
            $table->unsignedBigInteger('id_hotel');
            $table->foreign('id_hotel')->references('id')->on('hotels')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('reservations_rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_rooms');
            $table->foreign('id_rooms')->references('id')->on('rooms')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_reservations');
            $table->foreign('id_reservations')->references('id')->on('reservations')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
        Schema::dropIfExists('reservations_rooms');
    }
};
