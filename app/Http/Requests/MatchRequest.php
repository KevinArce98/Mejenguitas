<?php

namespace Mejenguitas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    => 'required|string',
            'players' => 'required|numeric|min:1',
            'price'   => 'required|numeric|min:1',
            'hour'    => 'required',
            'date'    => 'required',
            'site'    => 'required|string',
            'lat'     => 'required',
            'lng'     => 'required'
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'     => 'El campo nombre es requerido.',
            'name.string'       => 'El campo nombre tiene que ser texto.',
            'players.required'  => 'El campo jugadores es requerido.',
            'players.numeric'   => 'El campo jugadores tiene que ser numerico.',
            'players.min'       => 'El campo jugadores tiene que ser mínimo 1.',
            'price.required'    => 'El campo precio es requerido.',
            'price.numeric'     => 'El campo precio tiene que ser numerico.',
            'price.min'         => 'El campo precio tiene que ser mínimo 1.',
            'hour.required'     => 'El campo hora es requerido.',
            'date.required'     => 'El campo fecha es requerido.',
            'site.required'     => 'El campo ubicación es requerido.',
            'lat.required'      => 'El campo latitud es requerido.',
            'lng.required'      => 'El campo longitud es requerido.',
        ];
    }
}
