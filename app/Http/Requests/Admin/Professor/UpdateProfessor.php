<?php

namespace App\Http\Requests\Admin\Professor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateProfessor extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.professor.edit', $this->professor);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'celular' => ['sometimes', 'string'],
            'data_matricula' => ['nullable', 'date'],
            'data_nascimento' => ['sometimes', 'date'],
            'escola_id' => ['sometimes', 'string'],
            'registro' => ['nullable', 'string'],
            'telefone' => ['sometimes', 'string'],
            'user_id' => ['sometimes', 'integer'],
            
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
