<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('producto')->comment('Producto');
            $table->string('descripcion')->comment('Descripción');
            $table->string('unidad')->comment('Unidad');
            $table->integer('cantidad')->comment('Cantidad por cajas')->default(0);
            $table->float('precio')->comment('Precio por cajas');
            $table->enum('tipo', ['Producido', 'Comprado']);
            $table->boolean('activo')->default(1);
            $table->string('foto')->nulleable()->default('producto.jpg');
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
        Schema::dropIfExists('productos');
    }
}
