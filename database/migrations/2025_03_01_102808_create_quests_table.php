<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
{
    Schema::create('quests', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('name');
        $table->unsignedBigInteger('genreId');
        $table->unsignedBigInteger('difficultyId');
        $table->unsignedBigInteger('branchId');
        $table->integer('players_count');
        $table->string('game_time');
        $table->string('preview_image');
        $table->string('background_image');
        $table->text('description');
        $table->text('rules');
        $table->text('safety');
        $table->text('additional_services');
        $table->integer('additional_players');
        $table->integer('price_per_additional_player');
        $table->timestamps();
    });
	
	   // Создание таблицы слотов квестов
        Schema::create('quest_slots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('quest_id');
            $table->time('time');  
            $table->decimal('weekday_price', 10, 2);  
            $table->decimal('weekend_price', 10, 2); 
            $table->boolean('is_discount')->default(false);  
            $table->decimal('discount_price', 10, 2)->nullable(); 

            // Создание внешнего ключа к таблице quests
            $table->foreign('quest_id')->references('id')->on('quests')->onDelete('cascade');

            $table->timestamps();
        });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
    {
        // Удаление таблицы слотов квестов
        Schema::dropIfExists('quest_slots');
        
        // Удаление таблицы квестов
        Schema::dropIfExists('quests');
    }
}
