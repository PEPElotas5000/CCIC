<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MainRelationShips extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    public function up()
    {
        
        Schema::table('curso', function($table){
            $table -> foreign('id_asignatura')->references('id')->on('asignatura')->onDelete('cascade');
            $table -> foreign('id_grado')->references('id')->on('grado')->onDelete('cascade');
            $table -> foreign('id_docente')->references('id')->on('docente')->onDelete('cascade');
        });

        Schema::table('matricula', function($table){
            $table -> foreign('id_alumno')->references('id')->on('alumno')->onDelete('cascade');
            $table -> foreign('id_grado')->references('id')->on('grado')->onDelete('cascade');
        });

        Schema::table('nota', function($table){
            $table -> foreign('id_matricula')->references('id')->on('matricula')->onDelete('cascade');
            $table -> foreign('id_curso')->references('id')->on('curso')->onDelete('cascade');
        });    

        Schema::table('salon_horario', function($table){
            $table -> foreign('id_curso')->references('id')->on('curso')->onDelete('cascade');
        });      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
           
    }
}
