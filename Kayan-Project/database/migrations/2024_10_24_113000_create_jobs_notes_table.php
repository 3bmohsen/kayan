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
        Schema::create('jobs_notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id');  // مفتاح خارجي يشير إلى جدول العملاء
            $table->text('note');
            $table->timestamps();

            $table->foreign('job_id')->references('id')->on('emp_jobs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs_notes');
    }
};
