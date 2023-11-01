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
        Schema::create('raffle_order', function (Blueprint $table) {
            $table->id();
            $table->integer("raffle_id");
            $table->decimal("amount");
            $table->timestamp('date_purchase');
            $table->integer("user_id");
            $table->tinyInteger("winner_status")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raffle_order');
    }
};
