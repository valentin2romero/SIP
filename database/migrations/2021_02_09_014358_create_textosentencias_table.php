<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextosentenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('textosentencias', function (Blueprint $table) {
            $table->id();
            $table->string('variable',100);
            $table->integer('opcion');
            $table->longText('descripcion')->nullable();
            $table->date('fecha_inicio')->default(now());
            $table->date('fecha_final')->default('9999-12-31');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('textosentencias');
    }
}