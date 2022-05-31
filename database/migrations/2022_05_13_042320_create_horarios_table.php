<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('maestro_id')->constrained();
            $table->foreignId('materia_id')->constrained();
            $table->foreignId('grupo_id')->constrained();
            $table->foreignId('hora_id')->constrained();
            $table->foreignId('dia_id')->constrained();
            $table->foreignId('aula_id')->constrained();
            $table->unique(['materia_id', 'grupo_id', 'hora_id', 'dia_id']);
            $table->unique(['materia_id', 'maestro_id',  'hora_id', 'dia_id']);
            $table->unique(['maestro_id',  'aula_id', 'hora_id', 'dia_id']);
            $table->unique(['aula_id', 'dia_id', 'hora_id']);
            $table->unique(['grupo_id', 'dia_id', 'hora_id']);
            $table->unique(['maestro_id', 'dia_id', 'hora_id']);
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
        Schema::dropIfExists('horarios');
    }
}
