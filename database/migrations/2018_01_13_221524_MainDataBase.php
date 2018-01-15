<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MainDataBase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        
        Schema::create('alumnos', function($table){

            $table -> integer('id')->unsigned()->index();
            $table -> string('nombres', 45);
            $table -> string('apellidos', 45);
            $table -> date('fecha_nacimiento');
            $table -> string('direccion', 45);
            $table -> string('contrasenia', 255);
            $table -> string('nombre_padre', 100);
            $table -> string('nombre_madre', 100);

            $table -> primary('id');
        });

        Schema::create('coordinadores', function($table){
            $table -> integer('id')->unsigned()->index();
            $table -> string('nombres', 45);
            $table -> string('apellidos', 45);
            $table -> string('contrasenia', 255);

            $table -> primary('id');
        });

        Schema::create('docentes', function($table){
            $table -> integer('id')->unsigned()->index();
            $table -> string('nombres', 45);
            $table -> string('apellidos', 45);
            $table -> string('especialidad', 10);
            $table -> string('contrasenia', 255);

            $table -> primary('id');
        });

        Schema::create('asignaturas', function($table){
            $table -> integer('id')->unsigned()->index();
            $table -> string('nombre', 45);

            $table -> primary('id');
        });
        Schema::create('cursos', function($table){
            $table -> integer('id')->unsigned()->index();
            $table -> integer('asig')->unsigned();
            $table -> integer('grado')->unsigned();
            $table -> integer('doce')->unsigned();
            $table -> string('horario', 50);
            $table -> integer('anio')->unsigned();

            $table -> primary(['id', 'asig', 'grado', 'doce', 'horario', 'anio']);

        });

        Schema::create('grados', function($table){
            $table -> integer('id')->unsigned()->index();
            $table -> string('numero', 45);
            $table -> string('seccion', 45);
            $table -> string('nivel', 45);
            $table -> integer('anio_academico')->unsigned();
            $table -> integer('vacantes');

            $table -> primary(['id', 'nivel', 'seccion', 'anio_academico']);
        });

        Schema::create('matriculas', function($table){
            $table -> integer('id')->unsigned()->index();
            $table -> integer('id_alumno')->unsigned();
            $table -> integer('id_grado')->unsigned();
            $table -> date('fecha');
            $table -> integer('anio_academico')->unsigned();

            $table -> primary(['id', 'id_alumno', 'anio_academico']);
        });

        Schema::create('notas', function($table){
            $table -> integer('id')->unsigned();
            $table -> integer('id_matricula')->unsigned();
            $table -> integer('id_curso')->unsigned();
            $table -> tinyInteger('trimestre')->unsigned();
            $table -> integer('nota')->unsigned();
            $table -> string('observaciones', 255);

            $table -> primary('id');
        }); 
        Schema::create('fecha_ingreso', function($table){
            $table -> integer('id')->unsigned();
            $table -> integer('anio_academico')->unsigned();
            $table -> tinyInteger('trimestre')->unsigned();
            $table -> date('fecha_inicio');
            $table -> date('fecha_fin');

            $table -> primary('id');
        });           
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('coordinadores');
        Schema::drop('notas');
        Schema::drop('matriculas');
        Schema::drop('cursos');
        Schema::drop('asignaturas');
        Schema::drop('alumnos');
        Schema::drop('docentes');
        Schema::drop('grados');
        Schema::drop('fecha_ingreso');
    }
}
