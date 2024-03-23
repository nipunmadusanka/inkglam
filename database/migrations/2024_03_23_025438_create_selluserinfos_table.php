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
        Schema::create('selluserinfos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uId');
            $table->string('name')->default('name');
            $table->string('phone')->default('123');
            $table->string('nic')->default('nic');
            $table->string('delivery_address')->default('delivery_address');
            $table->string('email')->default('email');
            $table->longText('message')->default('message');
            $table->string('notes')->nullable();
            $table->string('status')->default('1');
            $table->timestamps();

            $table->foreign('uId')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('selluserinfos');
    }
};
