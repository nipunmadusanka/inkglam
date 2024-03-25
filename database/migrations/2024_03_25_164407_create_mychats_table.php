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
        Schema::create('mychats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('senderid');
            $table->unsignedBigInteger('receiveid');
            $table->string('message')->nullable();
            $table->string('files')->nullable();
            $table->string('read')->nullable();
            $table->longText('note')->nullable();
            $table->string('status')->default('1');
            $table->timestamps();

            $table->foreign('senderid')->references('id')->on('users');
            $table->foreign('receiveid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mychats');
    }
};
