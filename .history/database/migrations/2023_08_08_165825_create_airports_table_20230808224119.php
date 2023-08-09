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
        Schema::create('airports', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->bigIncrements('id');
            $table->bigInteger('code');
            $table->string('airline');
            $table->string('origin');
            $table->string('destination');
            $table->dateTime('boarding_time');
            $table->dateTime('arrival_time');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airports');
    }
};
