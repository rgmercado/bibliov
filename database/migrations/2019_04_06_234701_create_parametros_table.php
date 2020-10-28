<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParametrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametros', function (Blueprint $table) {
            $table->increments('id');
            $table->text('contactos');
            $table->text('equipos');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('correo');
            $table->string('linkedin');
            $table->integer('investigaciones');
            $table->integer('revistas');
            $table->integer('tesispre');
            $table->integer('tesispos');
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
            Schema::dropIfExists('parametros');
    }
}
