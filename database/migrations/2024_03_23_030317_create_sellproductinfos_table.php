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
        Schema::create('sellproductinfos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uId');
            $table->unsignedBigInteger('catId');
            $table->unsignedBigInteger('pId');
            $table->unsignedBigInteger('uInfoId');
            $table->unsignedBigInteger('payInfoId');
            $table->decimal('unit_price')->nullable();
            $table->integer('qty')->nullable();
            $table->decimal('total')->nullable();
            $table->decimal('discount')->nullable();
            $table->string('status')->default('1');
            $table->timestamps();

            $table->foreign('uId')->references('id')->on('users');
            $table->foreign('catId')->references('id')->on('maincatitems');
            $table->foreign('pId')->references('id')->on('sellitems');
            $table->foreign('uInfoId')->references('id')->on('selluserinfos');
            $table->foreign('payInfoId')->references('id')->on('paymentinfos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellproductinfos');
    }
};
