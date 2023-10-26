<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeamRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|exists:players,name',
            'csatar_id' => 'required|integer',
            'kapus_id' => 'required|integer|different:csatar_id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'A név mező nem lehet üres',
            'name.exists' => 'Ilyen nevű csapat már létezik',
            'kapus_id.different' => 'Csatár és kapus játékos nem lehet ugyan az'
        ];
    }
}
