<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriaPrimasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias_primas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->double('cantidad')->default(0);
            $table->double('cant_min');
            $table->double('cant_max');
            $table->string('unidad');
            $table->double('costo');
            $table->string('proveedor');
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
        Schema::dropIfExists('materias_primas');
    }
}
