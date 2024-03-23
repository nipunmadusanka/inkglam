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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uId');
            $table->unsignedBigInteger('payInfoId');
            $table->unsignedBigInteger('uInfoId');
            $table->unsignedBigInteger('sellProductId');
            $table->decimal('total')->nullable();
            $table->decimal('discount')->nullable();
            $table->longText('notes')->nullable();
            $table->string('status')->default('1');
            $table->timestamps();

            $table->foreign('uId')->references('id')->on('users');
            $table->foreign('payInfoId')->references('id')->on('paymentinfos');
            $table->foreign('uInfoId')->references('id')->on('selluserinfos');
            $table->foreign('sellProductId')->references('id')->on('sellproductinfos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
