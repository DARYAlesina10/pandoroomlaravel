<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBookingsTable extends Migration
{
    public function up(): void
    {
        Schema::create('table_bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('venue_table_id');
            $table->date('booking_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('staff_name');
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('quest_booking_id')->nullable();
            $table->timestamps();

            $table->foreign('venue_table_id')->references('id')->on('venue_tables')->onDelete('cascade');
            $table->foreign('quest_booking_id')->references('id')->on('quest_bookings')->onDelete('set null');
            $table->unique(['venue_table_id', 'booking_date', 'start_time']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('table_bookings');
    }
}
