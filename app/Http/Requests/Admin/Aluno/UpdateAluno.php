<?php

namespace App\Http\Requests\Admin\Aluno;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateAluno extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.aluno.edit', $this->aluno);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'bol_aee' => ['nullable', 'boolean'],
            'celular' => ['sometimes', 'string'],
            'data_matricula' => ['nullable', 'date'],
            'data_nascimento' => ['sometimes', 'date'],
            'email_responsavel' => ['nullable', 'string'],
            'escola_id' => ['sometimes', 'string'],
            'registro' => ['nullable', 'string'],
            'telefone' => ['sometimes', 'string'],
            'turma_id' => ['sometimes', 'string'],
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
