<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->String('id_encargado')->nullable()->default(0);
            $table->String('codigo');
            $table->String('id_cliente');
            $table->Float('subtotal');
            $table->Float('descuento')->nullable()->default(0);
            $table->Float('impuestos');
            $table->Double('total')->nullable()->default(0);
            $table->String('tipo');
            $table->String('tipo_pago')->nullable()->default(0);
            $table->String('estatus_pago')->nullable()->default("Pendiente");
            $table->String('PayerID')->nullable()->default(0);
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
        Schema::dropIfExists('ventas');
    }
}
