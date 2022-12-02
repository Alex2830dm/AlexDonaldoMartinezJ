<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('cliente');
            $table->string('representante');
            $table->string('codigo');
            $table->string('telefono')->nullable()->default('N/A');
            $table->string('email')->nullable()->default('N/A');
            $table->string('ruta');
            $table->string('d_calle')->nullable()->default('N/A');
            $table->string('d_colonia')->nullable()->default('N/A');
            $table->string('d_municipio');
            $table->string('d_referencia')->nullable()->default('N/A');
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
        Schema::dropIfExists('clientes');
    }
}
