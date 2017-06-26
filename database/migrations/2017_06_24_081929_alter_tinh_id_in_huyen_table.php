<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTinhIdInHuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Huyen', function($table)
        {
            $table->bigInteger('TinhID')->after('TenHuyen')->nullable();
            $table->foreign('TinhID')->references('TinhID')->on('Tinh');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Huyen', function($table)
        {
            $table->dropForeign('TinhID');
            $table->dropColumn('TinhID');

        });
    }
}
