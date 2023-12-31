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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger('user_id')->nullable();
            $table->boolean('revised')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('title', 150);
            $table->text('body', 1000);
            $table->unsignedDecimal('price', 8, 2);

            $table->timestamps();

            // Definizione delle chiavi esterne
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            // Rimuovere prima gli indici e le chiavi esterne
            $table->dropForeign(['user_id']);
            $table->dropForeign(['category_id']);
        });


        Schema::dropIfExists('announcements');
    }
};
