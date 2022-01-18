<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PadronEstablecimiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('padron_establecimientos', function (Blueprint $table) {
            $table->id();
            $table->string('jurisdiccion');
            $table->string('sector');
            $table->string('ambito');
            $table->string('departamento');
            $table->string('cod_departamento');
            $table->string('localidad');
            $table->string('cod_localidad');
            $table->string('cue');
            $table->string('cueanexo');
            $table->string('nombre');
            $table->string('domicilio');
            $table->string('cod_postal')->nullable();;
            $table->string('cod_area_telefonico')->nullable();
            $table->string('num_telefono')->nullable();
            $table->string('correo')->nullable();
            $table->integer('ed_comun')->nullable();
            $table->integer('ed_especial')->nullable();
            $table->integer('ed_jovenes_adultos')->nullable();
            $table->integer('ed_artistica')->nullable();
            $table->integer('ed_hospitalaria_domiciliaria')->nullable();
            $table->integer('ed_intercultural_bilingue')->nullable();
            $table->integer('ed_contexto_encierro')->nullable();
            $table->integer('edcom_jardin_maternal')->nullable();
            $table->integer('edcom_inicial')->nullable();
            $table->integer('edcom_primaria')->nullable();
            $table->integer('edcom_secundaria')->nullable();
            $table->integer('edcom_secundaria_tecnica')->nullable();
            $table->integer('edcom_superior_no_universitario')->nullable();
            $table->integer('edcom_superior_no_universitario_inet')->nullable();
            $table->integer('edesp_educacion_temprana')->nullable();
            $table->integer('edesp_inicial')->nullable();
            $table->integer('edesp_primaria')->nullable();
            $table->integer('edesp_secundaria')->nullable();
            $table->integer('edesp_integracion')->nullable();
            $table->integer('edjya_primaria')->nullable();
            $table->integer('edjya_egb3')->nullable();
            $table->integer('edjya_secundaria')->nullable();
            $table->integer('edjya_alfabetizacion')->nullable();
            $table->integer('edjya_formacion_profesional')->nullable();
            $table->integer('edjya_formacion_profesional_inet')->nullable();
            $table->integer('edart_secundaria')->nullable();
            $table->integer('edart_superior_no_universitario')->nullable();
            $table->integer('edart_cursos_talleres')->nullable();
            $table->integer('edhos_inicial')->nullable();
            $table->integer('edhos_primaria')->nullable();
            $table->integer('edhos_secundaria')->nullable();
            $table->integer('edhos_servicios_complementarios')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('padron_establecimientos');
    }
}
