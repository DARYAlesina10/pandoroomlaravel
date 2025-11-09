<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quest_bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('quest_id');
            $table->unsignedBigInteger('quest_slot_id');
            $table->date('booking_date');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->decimal('price', 10, 2);
            $table->timestamps();

            $table->foreign('quest_id')
                ->references('id')
                ->on('quests')
                ->onDelete('cascade');

            $table->foreign('quest_slot_id')
                ->references('id')
                ->on('quest_slots')
                ->onDelete('cascade');

            $table->unique(['quest_slot_id', 'booking_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quest_bookings');
    }
};
