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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('file_id');
            $table->unsignedBigInteger('client_id');  // تأكد من استخدام الاسم الصحيح هنا

            $table->string('message');
            
            $table->timestamps();
            $table->foreign('client_id')->references('client_id')->on('personal_docs')->onDelete('cascade');

            // تأكد من وجود علاقة بين الملف والتنبيه
            $table->foreign('file_id')->references('id')->on('personal_docs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
