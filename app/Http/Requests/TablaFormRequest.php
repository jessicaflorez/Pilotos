<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class |Tabla|FormRequest extends Request
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
    public function rules(){
        switch ($this->method()) {
            case 'POST':    //Nuevo
                $rules = [
                    |ParrafoRepetirCampo_SinPrimaryKey|'|campo|'=>'|reglaValidacionCampoNuevo|',
                    |FinParrafoRepetirCampo_SinPrimaryKey|
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    |ParrafoRepetirCampo_SinPrimaryKey1|'|campo|'=>'|reglaValidacionCampoEdicion|',
                    |FinParrafoRepetirCampo_SinPrimaryKey1|
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
