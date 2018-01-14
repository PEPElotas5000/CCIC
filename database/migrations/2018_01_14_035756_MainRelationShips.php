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
        
        Schema::table('cursos', function($table){
            $table -> foreign('asig')->references('id')->on('asignaturas')->onDelete('cascade');
            $table -> foreign('grado')->references('id')->on('grados')->onDelete('cascade');
            $table -> foreign('doce')->references('id')->on('docentes')->onDelete('cascade');
        });

        Schema::table('matriculas', function($table){
            $table -> foreign('id_alumno')->references('id')->on('alumnos')->onDelete('cascade');
            $table -> foreign('id_grado')->references('id')->on('grados')->onDelete('cascade');
        });

        Schema::table('notas', function($table){
            $table -> foreign('id_matricula')->references('id')->on('matriculas')->onDelete('cascade');
            $table -> foreign('id_curso')->references('id')->on('cursos')->onDelete('cascade');
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
