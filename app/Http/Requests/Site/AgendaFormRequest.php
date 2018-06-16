<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class AgendaFormRequest extends FormRequest
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
            'nome'      => 'required|min:3|max:150',
            'cpf'       => 'required',
            'email'     => 'required|min:3|max:50',
            'animal'    => 'required|min:3|max:150',
            'raca'      => 'required|min:3|max:150',
            'pelo'      => 'required|min:3|max:150',
            'peso'      => 'required|numeric',
            'data'      => 'required|date'
        ];
    }
}
