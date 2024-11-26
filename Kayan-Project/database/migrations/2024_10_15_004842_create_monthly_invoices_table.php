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
        Schema::create('monthly_invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');  // مفتاح خارجي يشير إلى جدول العملاء
            $table->unsignedBigInteger('Mondoc_id');  // مفتاح خارجي يشير إلى جدول العملاء
            $table->enum('type', ['sale', 'purchase']); // مبيعات أو مشتريات

            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('Mondoc_id')->references('id')->on('_added_val')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_invoices');
    }
};
