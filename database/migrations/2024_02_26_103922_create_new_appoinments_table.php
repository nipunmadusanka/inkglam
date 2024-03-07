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
        Schema::create('new_appoinments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uId');
            $table->unsignedBigInteger('eId');
            $table->unsignedBigInteger('sId');
            $table->unsignedBigInteger('tId');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->date('date');
            $table->string('message');
            $table->string('status')->default('1');
            $table->timestamps();

            $table->foreign('uId')->references('id')->on('users');
            $table->foreign('eId')->references('id')->on('employes');
            $table->foreign('sId')->references('id')->on('products');
            $table->foreign('tId')->references('id')->on('timeslots');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_appoinments');
    }
};
