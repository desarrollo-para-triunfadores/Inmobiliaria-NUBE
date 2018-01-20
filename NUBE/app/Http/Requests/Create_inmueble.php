<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Create_inmueble extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'foto_presentacion_nuevo' => 'image|max:999999999',
            'foto_carrusel_1' => 'image|max:999999999',
            'foto_carrusel_2' => 'image|max:999999999',
            'foto_carrusel_3' => 'image|max:999999999',
            'foto_carrusel_4' => 'image|max:999999999',
            'foto_carrusel_5' => 'image|max:999999999',
            'foto_detalle_1' => 'image|max:999999999',
            'foto_detalle_2' => 'image|max:999999999',
            'foto_detalle_3' => 'image|max:999999999',
            'foto_detalle_4' => 'image|max:999999999',
            'foto_plano_1' => 'image|max:999999999',
            'foto_plano_2' => 'image|max:999999999',
            'imagen' => 'image|max:999999999'
        ];
    }

}
