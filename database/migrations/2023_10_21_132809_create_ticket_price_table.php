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
        Schema::create('ticket_price', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('raffle_id');
            $table->decimal('one',10.2);
            $table->decimal('three', 10,2);
            $table->decimal('ten', 10,2);
            $table->decimal('twenty', 10,2);
            $table->decimal('one_twenty', 10,2);
            $table->decimal('two_hundred', 10,2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_price');
    }
};
