<?php

namespace App\Http\Requests\API\Adm;

use App\Models\Adm\Texto;
use InfyOm\Generator\Request\APIRequest;

class UpdateTextoAPIRequest extends APIRequest
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
        $rules = Texto::$rules;
        
        return $rules;
    }
}
