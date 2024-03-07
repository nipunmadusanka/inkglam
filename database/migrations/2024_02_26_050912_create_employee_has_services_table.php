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
        Schema::create('employee_has_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_Id');
            $table->unsignedBigInteger('eId');
            $table->unsignedBigInteger('sId');
            $table->string('status')->default('1');
            $table->timestamps();

            $table->foreign('admin_Id')->references('id')->on('users');
            $table->foreign('eId')->references('id')->on('employes');
            $table->foreign('sId')->references('id')->on('products');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_has_services');
    }
};
