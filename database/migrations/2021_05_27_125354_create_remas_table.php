<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->string('numero_unidad')->nullable();
            $table->string('nombres_conductor')->nullable();
            $table->string('apellidos_conductor')->nullable();
            $table->time('hora_de_llamada');
            $table->time('hora_de_salida');
            $table->time('hora_de_llegada');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id', 'fk_remas_users1')->references('id')->on('users');
            $table->foreign('paciente_id', 'fk_remas_pacientes1')->references('id')->on('pacientes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remas');
    }
}
