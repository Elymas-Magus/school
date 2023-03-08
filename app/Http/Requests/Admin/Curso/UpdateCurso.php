<?php

namespace App\Http\Requests\Admin\Curso;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateCurso extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.curso.edit', $this->curso);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'activated' => ['sometimes', 'boolean'],
            'descricao' => ['nullable', 'string'],
            'escola_id' => ['sometimes', 'string'],
            'nome' => ['sometimes', 'string'],
            'qtd_vagas_alunos' => ['sometimes', 'integer'],
            'qtd_vagas_alunos_aee' => ['sometimes', 'integer'],
            'total_periodos' => ['nullable', 'integer'],
            
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
