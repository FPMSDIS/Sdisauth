<?php

namespace App\Http\Requests\Sdisauth;

use Illuminate\Foundation\Http\FormRequest;
/**
 * Author : OUATTARA EL HADJ YOUSSOUF <youssouf.ouattara@fpmnet.ci>
 * Mise à jour de la methode : 04/02/2025
 */
class ModificationPermissionRequest extends FormRequest
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
        $id = $this->route('id');

        return [
            'name' => 'required|string|unique:permissions,name,' . $id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Le permission est obligatoire",
            'name.unique' => "Le permission existe déjà dans le système",
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'name' => $this->permission,
        ]);
    }
}
