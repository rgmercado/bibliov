<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddResumenDocumenturl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documentourls', function (Blueprint $table) {
            $table->text('resumenes');
            $table->text('resumenin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documentourls', function (Blueprint $table) {
            dropColumn('resumenes');
            dropColumn('resumenin');
        });
    }
}
