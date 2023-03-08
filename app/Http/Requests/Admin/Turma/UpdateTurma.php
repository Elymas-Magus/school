<?php

namespace App\Http\Requests\Admin\Turma;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateTurma extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.turma.edit', $this->turma);
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
            'bol_aee' => ['sometimes', 'boolean'],
            'escola_id' => ['sometimes', 'string'],
            'nome' => ['sometimes', 'string'],
            'periodo_letivo_id' => ['sometimes', 'string'],
            'qtd_vagas_alunos' => ['sometimes', 'integer'],
            'qtd_vagas_alunos_aee' => ['sometimes', 'integer'],
            'turno_escolar_id' => ['sometimes', 'integer'],
            
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
