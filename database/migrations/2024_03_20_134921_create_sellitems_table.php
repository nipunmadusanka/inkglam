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
        Schema::create('sellitems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uId');
            $table->unsignedBigInteger('mcatId');
            $table->string('item')->default('item');
            $table->string('description')->default('description');
            $table->string('brand')->default('brand');
            $table->string('item_code')->default('code');
            $table->string('color')->default('color');
            $table->string('model')->default('model');
            $table->string('made_in')->default('made_in');
            $table->date('model_year')->nullable();
            $table->decimal('price')->nullable();
            $table->decimal('discount')->nullable();
            $table->integer('qty')->nullable();
            $table->string('image')->default('image.jpg');
            $table->string('note')->default('note');
            $table->string('status')->default('1');
            $table->timestamps();

            $table->foreign('uId')->references('id')->on('users');
            $table->foreign('mcatId')->references('id')->on('maincatitems');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellitems');
    }
};
