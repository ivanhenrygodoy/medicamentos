<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recetas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('numero');
            $table->timestamps();
            
            //llaves foraneas
            $table->unsignedBigInteger('id_establecimiento');
            $table->foreign('id_establecimiento')->references('id')->on('establecimientos');

            $table->unsignedBigInteger('id_medico');
            $table->foreign('id_medico')->references('id')->on('medicos');

            $table->unsignedBigInteger('id_paciente');
            $table->foreign('id_paciente')->references('id')->on('pacientes');  




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recetas');
    }
};
