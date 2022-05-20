<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // nombre producto
            $table->string('descripcion'); // descripcion producto
            $table->string('tipo_producto'); // comprado - producido
            $table->string('calibre_producto'); // Grande - pequeño - mediano -> producidos
            $table->string('clasificacion_producto'); // Carne, condimentos, verdura, implemento-aceite-cuerda
            $table->integer('cantidad'); // cantidad
            $table->string('duracion'); // dias que dura sin vencer
            $table->string('fecha_vencimiento'); // fecha de  vencimiento del producto
            $table->string('estado_producto'); // saber si vencio el producto
            $table->integer('peso_unitario'); //   peso unitario del producto
            $table->string('proveedor')->nullable(); //
            $table->integer('valor_venta')->nullable(); //
            $table->integer('valor_compra')->nullable(); //

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
        Schema::dropIfExists('producto');
    }
}
