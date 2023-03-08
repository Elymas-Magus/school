<?php

namespace App\Http\Requests\Admin\Aluno;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreAluno extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.aluno.create');
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
            'celular' => ['required', 'string'],
            'data_matricula' => ['nullable', 'date'],
            'data_nascimento' => ['required', 'date'],
            'email_responsavel' => ['nullable', 'string'],
            'escola_id' => ['required', 'string'],
            'registro' => ['nullable', 'string'],
            'telefone' => ['required', 'string'],
            'turma_id' => ['required', 'string'],
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
