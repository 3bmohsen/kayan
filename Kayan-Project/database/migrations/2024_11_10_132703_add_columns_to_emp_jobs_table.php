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
        Schema::table('emp_jobs', function (Blueprint $table) {
            $table->string('file_path')->nullable();  // مسار تخزين الملف
            $table->string('file_name')->nullable();  // اسم الملف الأصلي
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('emp_jobs', function (Blueprint $table) {
            //
        });
    }
};
