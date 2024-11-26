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
        Schema::table('monthly_invoices', function (Blueprint $table) {
            $table->string('invoice_path')->nullable();  // مسار تخزين الملف
            $table->string('invoice_name')->nullable();         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('monthly_invoices', function (Blueprint $table) {
            //
        });
    }
};
