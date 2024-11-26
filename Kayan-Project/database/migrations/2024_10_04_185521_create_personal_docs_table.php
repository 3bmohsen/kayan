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
        Schema::create('personal_docs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');  // مفتاح خارجي يشير إلى جدول العملاء
            $table->string('file_path');  // مسار تخزين الملف
            $table->string('file_name');  // اسم الملف الأصلي
            $table->text('notes');
            $table->date('expDate');
            $table->enum('filetype', ['1', '2','3','4','5','6']);
            $table->timestamps();

            // إعداد المفتاح الخارجي
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_docs');
    }
};
