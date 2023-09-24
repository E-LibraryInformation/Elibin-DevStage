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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 125);
            $table->text('sinopsis');
            $table->integer('stok');
            $table->enum('status', [
                'Available',
                'Unavailable'
            ]);
            $table->string('penulis', 125);
            $table->text('rak');
            $table->string('rating', 10);
            $table->text('gambar');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
