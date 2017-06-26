<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdateFieldInAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Huyen', function (Blueprint $table) {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::table('Tinh', function (Blueprint $table) {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::table('Lop', function (Blueprint $table) {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::table('KhoaHoc', function (Blueprint $table) {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::table('Phong', function (Blueprint $table) {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::table('TienTri', function (Blueprint $table) {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::table('TrangThaiTien', function (Blueprint $table) {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::table('TienThu', function (Blueprint $table) {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::table('KhoanChi', function (Blueprint $table) {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::table('KhoanThu', function (Blueprint $table) {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::table('HocVien', function (Blueprint $table) {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Huyen', function($table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
        Schema::table('Tinh', function($table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
        Schema::table('HocVien', function($table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
        Schema::table('KhoaHoc', function($table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
        Schema::table('KhoanChi', function($table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
        Schema::table('KhoanThu', function($table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
        Schema::table('Lop', function($table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
        Schema::table('Phong', function($table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
        Schema::table('TienThu', function($table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
        Schema::table('TienTri', function($table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
        Schema::table('TrangThaiTien', function($table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
}
