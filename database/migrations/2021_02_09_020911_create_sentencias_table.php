<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSentenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sentencias', function (Blueprint $table) {
            $table->id();
            $table->string('MesAnio',50);
            $table->string('NroExp',25);
            $table->longText('Caratula');
            $table->string('NomActor',100);
            $table->string('DniActor',20);
            $table->string('NomAbogado',100);
            $table->longText('PideError')->nullable();
            $table->integer('PideTasa');
            $table->integer('PideExim');
            $table->integer('ContestaExc');
            $table->longText('NroJP');
            $table->dateTime('FecAdq');
            $table->integer('TienePAP');
            $table->longText('PlanteaError')->nullable();
            $table->integer('FecAdq1');
            $table->integer('FecAdq2');
            $table->integer('FecAdq3');
            $table->integer('FecAdq4');
            $table->integer('FecAdq5');
            $table->integer('TasaFallo');
            $table->integer('PideEximG');
            $table->integer('FecIni');
            $table->integer('Tiempo');
            $table->dateTime('FecPedido');
            $table->integer('Honorarios');
            $table->timestamps();
            
            $table->unsignedBigInteger('JubPen');
            $table->foreign('JubPen')->references('id')->on('tipoprevisiones');
            
            $table->unsignedBigInteger('dependencia_id');
            $table->foreign('dependencia_id')->references('id')->on('dependencias');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sentencias');
    }
}