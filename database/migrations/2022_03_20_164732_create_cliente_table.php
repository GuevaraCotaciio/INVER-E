<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->id();
            $table->string('id_persona');    //relación con la tabla persona y un registro 
            $table->string('estado_cliente'); //activo - inactivo
            $table->string('tipo_cliente'); //comercial - proveedor - nuevo - 
            $table->string('id_pedidos');   //cantidad de pedidos 
            $table->string('id_producto');   //productos que compra
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
        Schema::dropIfExists('cliente');
    }
}
