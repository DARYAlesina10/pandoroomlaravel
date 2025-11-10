<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableBookingIdToQuestBookingsTable extends Migration
{
    public function up(): void
    {
        Schema::table('quest_bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('table_booking_id')->nullable()->after('price');

            $table->foreign('table_booking_id')->references('id')->on('table_bookings')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('quest_bookings', function (Blueprint $table) {
            $table->dropForeign(['table_booking_id']);
            $table->dropColumn('table_booking_id');
        });
    }
}
