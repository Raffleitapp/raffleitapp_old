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
        Schema::create('raffle', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('organisation_id');
            $table->bigInteger('fundraising_id');
            $table->string('host_name');
            $table->longText('description');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('target');
            $table->date('starting_date');
            $table->date('ending_date');
            $table->string("state_raffle_hosted")->nullable();
            $table->tinyInteger("approve_status")->comment("1:approved;2:pending, 3:completed, 4: cancelled");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raffle');
    }
};
