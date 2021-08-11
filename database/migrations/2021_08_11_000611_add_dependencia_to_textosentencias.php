<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDependenciaToTextosentencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('textosentencias', function (Blueprint $table) {
            $table->unsignedBigInteger('dependencia_id')->nullable();
            $table->foreign('dependencia_id')->references('id')->on('dependencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('textosentencias', function (Blueprint $table) {
            $table->dropColumn('dependencia_id');
        });
    }
}
