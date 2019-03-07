<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentourlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentourls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('urlp', 100)->nullable();
            $table->string('urldoc', 100)->nullable();
            $table->char('cota_doc', 20)->unique()->change();
            $table->timestamps();
            $table->foreign('cota_doc')->references('cota')->on('documentos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentourls');
    }
}
