<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenueTablesTable extends Migration
{
    public function up(): void
    {
        Schema::create('venue_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('venue_hall_id');
            $table->string('name');
            $table->unsignedInteger('min_capacity')->default(1);
            $table->unsignedInteger('max_capacity');
            // MariaDB setups predating native JSON support will error on json() columns,
            // so we persist services as text while still casting it to an array in the model.
            $table->text('services')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('venue_hall_id')->references('id')->on('venue_halls')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('venue_tables');
    }
}
