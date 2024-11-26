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
        Schema::create('client_money', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');  // مفتاح خارجي يشير إلى جدول العملاء
            $table->integer('rec_amount')->nullable();
            $table->integer('spent_amount')->nullable();
            $table->integer('profit')->nullable();
            $table->text('notes')->nullable();


            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_money');
    }
};
