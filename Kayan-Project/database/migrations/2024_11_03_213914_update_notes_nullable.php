<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNotesNullable extends Migration
{
    public function up()
    {
        // استعراض كل جدول وتعديل عمود notes ليكون nullable
        Schema::table('activites', function (Blueprint $table) {
            $table->string('notes')->nullable()->change();
        });

        Schema::table('check_docs', function (Blueprint $table) {
            $table->string('notes')->nullable()->change();
        });
        Schema::table('check_periods', function (Blueprint $table) {
            $table->string('notes')->nullable()->change();
        });
        Schema::table('client_money', function (Blueprint $table) {
            $table->string('notes')->nullable()->change();
        });
        Schema::table('other_docs', function (Blueprint $table) {
            $table->string('notes')->nullable()->change();
        });
        Schema::table('personal_docs', function (Blueprint $table) {
            $table->string('notes')->nullable()->change();
        });
        Schema::table('tax_docs', function (Blueprint $table) {
            $table->string('notes')->nullable()->change();
        });
        Schema::table('_added_val', function (Blueprint $table) {
            $table->string('notes')->nullable()->change();
        });

        // أضف المزيد من الجداول هنا حسب الحاجة
    }

    public function down()
    {
        // إعادة العمود إلى حالته الأصلية (غير قابل للاستبعاد)
        Schema::table('your_first_table_name', function (Blueprint $table) {
            $table->string('notes')->nullable(false)->change();
        });

        Schema::table('your_second_table_name', function (Blueprint $table) {
            $table->string('notes')->nullable(false)->change();
        });

        // أضف المزيد من الجداول هنا حسب الحاجة
    }
}
