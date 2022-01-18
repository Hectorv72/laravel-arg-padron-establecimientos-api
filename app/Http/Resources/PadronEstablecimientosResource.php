<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PadronEstablecimientosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'cue'      => $this->cue,
            'cueanexo' => $this->cueanexo,
            'nombre'   => $this->nombre,
            'localizacion' => [
                'jurisdiccion'     => $this->jurisdiccion,
                'sector'           => $this->sector,
                'ambito'           => $this->ambito,
                'departamento'     => $this->departamento,
                'cod_departamento' => $this->cod_departamento,
                'localidad'        => $this->localidad,
                'cod_localidad'    => $this->cod_localidad,
                'domicilio'        => $this->domicilio,
                'cod_postal'       => $this->cod_postal
            ],
            'contacto' => [
                'cod_area_telefonico' => $this->cod_area_telefonico,
                'num_telefono'        => $this->num_telefono,
                'correo'              => $this->correo
            ],
            'modalidades' => [
                'educacion_comun'                     => $this->ed_comun,
                'educacion_especial'                  => $this->ed_especial,
                'educacion_jovenes_y_adultos'         => $this->ed_jovenes_adultos,
                'educacion_artistica'                 => $this->ed_artistica,
                'educacion_hospitalaria_domiciliaria' => $this->ed_hospitalaria_domiciliaria,
                'educacion_intercultural_bilingue'    => $this->ed_intercultural_bilingue,
                'educacion_contexto_encierro'         => $this->ed_contexto_encierro,
            ],
            'educacion_comun' => [
              'jardin_maternal'                => $this->edcom_jardin_maternal,
              'inicial'                        => $this->edcom_inicial,
              'primaria'                       => $this->edcom_primaria,
              'secundaria'                     => $this->edcom_secundaria,
              'superior_no_universitario'      => $this->edcom_superior_no_universitario,
              'superior_no_universitario_inet' => $this->edcom_superior_no_universitario_inet,
            ],
            'educacion_especial' => [
              'educacion_temprana' => $this->edesp_educacion_temprana,
              'inicial'     => $this->edesp_inicial,
              'primaria'    => $this->edesp_primaria,
              'secundaria'  => $this->edesp_secundaria,
              'integracion' => $this->edesp_integracion,
            ],
            'educacion_jovenes_y_adultos' => [
              'primaria'                   => $this->edjya_primaria,
              'egb3'                       => $this->edjya_egb3,
              'secundaria'                 => $this->edjya_secundaria,
              'alfabetizacion'             => $this->edjya_alfabetizacion,
              'formacion_profesional'      => $this->edjya_formacion_profesional,
              'formacion_profesional_inet' => $this->edjya_formacion_profesional_inet,
            ],
            'educacion_artistica' => [
              'secundaria'                => $this->edart_secundaria,
              'superior_no_universitario' => $this->edart_superior_no_universitario,
              'edart_cursos_talleres'     => $this->edart_cursos_talleres,
            ],
            'educacion_hospitalaria_domiciliaria' => [
              'inicial'                   => $this->edhos_inicial,
              'primaria'                  => $this->edhos_primaria,
              'secundaria'                => $this->edhos_secundaria,
              'servicios_complementarios' => $this->edhos_servicios_complementarios,
            ],
        ];
    }
}
