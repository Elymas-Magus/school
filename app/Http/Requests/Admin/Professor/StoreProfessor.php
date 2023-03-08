<?php

namespace App\Http\Requests\Admin\Professor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreProfessor extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.professor.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'celular' => ['required', 'string'],
            'data_matricula' => ['nullable', 'date'],
            'data_nascimento' => ['required', 'date'],
            'escola_id' => ['required', 'string'],
            'registro' => ['nullable', 'string'],
            'telefone' => ['required', 'string'],
            'user_id' => ['required', 'integer'],
            
        ];
    }

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
