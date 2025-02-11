<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/**
 * Author : OUATTARA EL HADJ YOUSSOUF <youssouf.ouattara@fpmnet.ci>
 * Mise à jour de la methode : 04/02/2025
 */
class AjouterPermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:permissions,name',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "La permission est obligatoire",
            'name.unique' => "La permission existe déjà dans le système",
        ];
    }

    // protected function prepareForValidation()
    // {
    //     dd($this->all());
    //     // $this->merge([
    //     //     'name' => $this->permission,
    //     // ]);

    //     if ($this->has('permission')) {
    //         $this->merge([
    //             'name' => $this->input('permission'),
    //         ]);
    //     }
    // }
}
