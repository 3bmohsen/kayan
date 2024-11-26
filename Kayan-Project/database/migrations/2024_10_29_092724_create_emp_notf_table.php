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
        Schema::create('emp_notf', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emp_id');
            $table->unsignedBigInteger('moved_emp_id')->nullable();

            $table->text('message');
            $table->enum('is_read',['true','false']);
            $table->timestamps();
            $table->foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('moved_emp_id')->references('id')->on('employees')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emp_notf');
    }
};
