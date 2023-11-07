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
        Schema::create('raffle_winner', function (Blueprint $table) {
            $table->id();
            $table->integer('raffle_id');
            $table->integer('winner_id');
            $table->integer('host_id');
            $table->timestamp('winner_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raffle_winner');
    }
};
