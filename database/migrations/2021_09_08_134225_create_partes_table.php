<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partes', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->string('tipo_cirugia');
            $table->string('especialidad');
            $table->string('diagnostico');
            $table->string('otro_diagnostico');
            $table->string('intervencion');
            $table->string('lateralidad');
            $table->string('otra_intervencion');
            $table->string('cma');
            $table->string('clasificacion_asa')->nullable();
            $table->decimal('tiempo_quirurgico');
            $table->string('anestecia_sugerida');
            $table->string('aislamiento');
            $table->string('alergia_latex');
            $table->string('usuario_taco');
            $table->string('necesidad_cama_upc');
            $table->string('prioridad');
            $table->string('necesita_donantes_sangre');
            $table->string('evaluacion_preanestesica');
            $table->string('equipo_rayos');
            $table->string('insumos_especificos');
            $table->string('ex_preoperatorios');
            $table->string('biopsia');
            $table->string('instrumental');
            $table->string('observaciones');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('partes');
    }
}
