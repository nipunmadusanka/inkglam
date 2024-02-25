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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uId');
            $table->unsignedBigInteger('sId');
            $table->string('comment');
            $table->string('admin_reply');
            $table->string('star')->default('0');
            $table->string('likes')->default('0');
            $table->string('dislikes')->default('0');
            $table->string('status')->default('0');
            $table->timestamps();

            $table->foreign('uId')->references('id')->on('users');
            $table->foreign('sId')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
