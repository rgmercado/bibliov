<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->primary('cota');
            $table->char('cota', 20);
            $table->string('titulo', 200);
            $table->string('autor', 200);
            $table->string('mencion_e', 200);
            $table->string('coleccion', 200);
            $table->string('editorial', 200);
            $table->date('fecha_pub');
            $table->integer('nunp');
            $table->char('isbn', 20);
            $table->string('idioma', 20);
            $table->string('idioma_o', 20);
            $table->string('clasificacion', 50);
            $table->string('materia', 100);
            $table->text('resumen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
}
