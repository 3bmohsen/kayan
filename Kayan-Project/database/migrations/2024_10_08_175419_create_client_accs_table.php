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
        Schema::create('client_accs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');  // مفتاح خارجي يشير إلى جدول العملاء
            $table->enum('acctype',['حساب منظومة الفاتوره الالكترونية','حساب مصلحة الضرايب']);
            $table->string('email');
            $table->string('pass');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_accs');
    }
};
