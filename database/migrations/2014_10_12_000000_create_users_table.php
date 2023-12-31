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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->enum('role', ['customer', 'revisor', 'admin'])->default('customer');
            $table->boolean('terms_accepted')->default(false);
            $table->string('name', 100)->unique();
            $table->string('email')->unique();
            $table->string('city', 50);
            $table->string('prov', 4);
            $table->date('birthday');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
