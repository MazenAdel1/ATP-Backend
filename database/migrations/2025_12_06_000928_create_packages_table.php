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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();

            // Foreign Key (تبع أنهي لعبة)
            $table->foreignId('game_id')->nullable()->constrained()->onDelete('cascade');

            $table->string('name'); // اسم الباقة (مثلاً: الذهبية، شهرية)
            $table->decimal('price', 8, 2); // السعر (8 أرقام منهم 2 عشري)
            $table->integer('sessions_count'); // عدد التمارين في الباقة
            $table->text('description')->nullable();

            $table->enum('gender', ['male', 'female']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
