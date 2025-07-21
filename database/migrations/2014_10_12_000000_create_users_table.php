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
            $table->id(); // Primary key: id
            $table->string('name'); // Nama user
            $table->string('email')->unique(); // Email (harus unik)
            $table->timestamp('email_verified_at')->nullable(); // Optional
            $table->string('password'); // Password (disimpan dalam bentuk hash)
            $table->rememberToken(); // Token untuk "remember me" login (opsional)
            $table->timestamps(); // created_at & updated_at
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
