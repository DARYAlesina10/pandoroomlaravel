<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SyncAdminRoleFlag extends Migration
{
    public function up()
    {
        if (
            Schema::hasTable('users') &&
            Schema::hasColumn('users', 'is_admin') &&
            Schema::hasColumn('users', 'role')
        ) {
            DB::table('users')
                ->where('is_admin', true)
                ->update(['role' => 'admin']);

            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('is_admin');
            });
        }
    }

    public function down()
    {
        if (
            Schema::hasTable('users') &&
            ! Schema::hasColumn('users', 'is_admin') &&
            Schema::hasColumn('users', 'role')
        ) {
            Schema::table('users', function (Blueprint $table) {
                $table->boolean('is_admin')->default(false);
            });

            DB::table('users')
                ->where('role', 'admin')
                ->update(['is_admin' => true]);
        }
    }
}
