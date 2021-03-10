<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MarcaFormRequest extends Request
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
        $user_id = auth()->user()->id;
        switch ($this->method()) {
            case 'POST':    //Nuevo
                $rules = [
                    'marca'=>'required|unique:marca,marca,NULL,id,user_id,'.$user_id.'|max:100',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'marca'=>'required|unique:marca,id,'.$this->id.',id|max:100',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
