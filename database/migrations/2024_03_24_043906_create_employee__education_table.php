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
        Schema::create('employee__education', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uId');
            $table->unsignedBigInteger('emId');
            $table->string('education')->nullable();
            $table->string('Institute')->nullable();
            $table->string('startdate')->nullable();
            $table->string('enddate')->nullable();
            $table->longText('notes')->nullable();
            $table->string('status')->default('1');
            $table->timestamps();

            $table->foreign('uId')->references('id')->on('users');
            $table->foreign('emId')->references('id')->on('employes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee__education');
    }
};
