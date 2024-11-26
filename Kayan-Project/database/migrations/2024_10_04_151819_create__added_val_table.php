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
        Schema::create('_added_val', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');  // مفتاح خارجي يشير إلى جدول العملاء
            $table->string('doc_path');  // مسار تخزين الملف
            $table->string('doc_name');  // اسم الملف الأصلي
            $table->string('invoice_path')->nullable();  // مسار تخزين الملف
            $table->string('invoice_name')->nullable();  // اسم الملف الأصلي
            $table->text('notes');
            $table->enum('filetype', ['1', '2','3']);
            $table->timestamps();


            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_added_val');
    }
};
