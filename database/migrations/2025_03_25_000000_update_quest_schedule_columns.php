<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateQuestScheduleColumns extends Migration
{
    public function up(): void
    {
        Schema::table('quests', function (Blueprint $table) {
            $table->decimal('weekday_base_price', 10, 2)->default(0)->after('price_per_additional_player');
            $table->decimal('weekend_base_price', 10, 2)->default(0)->after('weekday_base_price');
        });

        Schema::table('quest_slots', function (Blueprint $table) {
            $table->boolean('weekday_enabled')->default(true)->after('time');
            $table->boolean('weekend_enabled')->default(true)->after('weekday_enabled');
            $table->boolean('weekday_uses_base_price')->default(false)->after('weekend_price');
            $table->boolean('weekend_uses_base_price')->default(false)->after('weekday_uses_base_price');
        });
    }

    public function down(): void
    {
        Schema::table('quest_slots', function (Blueprint $table) {
            $table->dropColumn([
                'weekday_enabled',
                'weekend_enabled',
                'weekday_uses_base_price',
                'weekend_uses_base_price',
            ]);
        });

        Schema::table('quests', function (Blueprint $table) {
            $table->dropColumn(['weekday_base_price', 'weekend_base_price']);
        });
    }
}
