<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsuarioFormRequest extends Request
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

        switch ($this->method()) {
            case 'POST':    //Nuevo
                $rules = [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|min:6|confirmed',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users,id,'.$this->id.',id',
                    'password' => 'required|min:6|confirmed',
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;
    }
}
