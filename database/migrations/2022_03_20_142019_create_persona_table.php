<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('tipo_documento')->nullable();
            $table->integer('documento')->unique()->nullable();
            $table->string('genero');
            $table->integer('edad');
            $table->integer('telefono');
            $table->string('ciudad');
            $table->string('direccion') ->unique();
            $table->string('email')->unique();
            $table->string('tipo_persona');  //cliente - Usuario
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
        Schema::dropIfExists('persona');
    }
}
