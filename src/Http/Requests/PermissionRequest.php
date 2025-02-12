<?php

namespace App\Http\Requests\Sdisauth;

use Illuminate\Foundation\Http\FormRequest;
/**
 * Author : OUATTARA EL HADJ YOUSSOUF <youssouf.ouattara@fpmnet.ci>
 * Mise à jour de la methode : 04/02/2025
 */
class PermissionRequest extends FormRequest
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
            'name' => "required|unique:permissions",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Le nom est obligatoire",
            'name.unique' => "Le nom existe déjà dans le système",
        ];
    }
}
