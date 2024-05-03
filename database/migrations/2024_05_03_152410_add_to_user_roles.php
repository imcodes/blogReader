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
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_role')->default('user');
            $table->integer('user_level')->comment('determines what the user can do on the website[0=super admin | 1=regular admin | 2=moderator | 3=community manager | 4=authors |   5=users]');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_role');
            $table->dropColumn('user_level');
        });
    }
};
