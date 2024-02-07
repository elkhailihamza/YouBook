<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->unsignedBigInteger('id_book');
            $table->unsignedBigInteger('id_user');

            $table->foreign('id_book')->references('id')->on('books')->constrained();
            $table->foreign('id_user')->references('id')->on('users')->constrained();

            $table->timestamps();
            $table->date('ends');
            $table->string('status');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
