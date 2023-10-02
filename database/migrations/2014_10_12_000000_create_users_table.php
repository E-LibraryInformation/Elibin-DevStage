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
            $table->string('fullname', 100);
            $table->string('username', 35)->unique();
            $table->string('password');
            $table->string('bio')->default('Hai, aku pengguna baru di Elibin, nice to meet you');
            $table->enum('role', [
                'pembaca',
                'penulis',
                'pustakawan',
                'admin'
            ])->default('pembaca');
            $table->enum('account', [
                'reguler',
                'premium'
            ])->default('reguler');
            $table->integer('followers')->default(0);
            $table->integer('following')->default(0);
            $table->text('gambar');
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
