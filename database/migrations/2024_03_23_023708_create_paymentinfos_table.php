<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('paymentinfos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uId');
            $table->string('bank')->default('bank_name');
            $table->string('holder')->default('holder_name');
            $table->string('card_type')->default('visa');
            $table->decimal('amount')->default(0);
            $table->integer('card_number')->default(0);
            $table->integer('security_code')->default(0);
            $table->string('exp_month')->default('0');
            $table->string('exp_year')->default('0');
            $table->string('notes')->default('notes');
            $table->integer('otp_code')->default(000);
            $table->rememberToken();
            $table->string('status')->default('0');
            $table->timestamps();

            $table->foreign('uId')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paymentinfos');
    }
};
