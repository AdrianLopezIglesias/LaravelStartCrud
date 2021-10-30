<?php

namespace App\Http\Requests\API;

use App\Models\PacienteDatosPersonales;
use InfyOm\Generator\Request\APIRequest;

class UpdatePacienteDatosPersonalesAPIRequest extends APIRequest
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
        $rules = PacienteDatosPersonales::$rules;
        
        return $rules;
    }
}
