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
        Schema::table('coaches', function (Blueprint $table) {
            $table->string('image_url')->nullable()->after('phone');
        });

        Schema::table('games', function (Blueprint $table) {
            $table->string('image_url')->nullable()->after('description');
        });

        Schema::table('partners', function (Blueprint $table) {
            $table->string('image_url')->nullable()->after('description');
        });

        Schema::table('packages', function (Blueprint $table) {
            $table->string('image_url')->nullable()->after('gender');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coaches', function (Blueprint $table) {
            $table->dropColumn('image_url');
        });

        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn('image_url');
        });

        Schema::table('partners', function (Blueprint $table) {
            $table->dropColumn('image_url');
        });

        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn('image_url');
        });
    }
};