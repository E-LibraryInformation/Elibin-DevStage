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
        Schema::create('borrowing', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('book_id');
            $table->integer('hari');
            $table->enum('status', [
                NULL, 'confirmed'
            ])->default(NULL);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
