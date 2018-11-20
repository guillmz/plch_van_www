<?php

namespace Vanguard\Http\Requests\Products;

use Vanguard\Http\Requests\Request;
use Vanguard\Unit;

class CreateProductUnit extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'clave' => 'required|min:2|max:4',
            'name'  => 'required|min:5',
            'description' => 'nullable',
            'notes' => 'nullable'
        ];

        return $rules;
    }
}
