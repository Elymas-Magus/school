<?php

namespace App\Http\Requests\Admin\Turma;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreTurma extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.turma.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'activated' => ['required', 'boolean'],
            'bol_aee' => ['required', 'boolean'],
            'escola_id' => ['required', 'string'],
            'nome' => ['required', 'string'],
            'periodo_letivo_id' => ['required', 'string'],
            'qtd_vagas_alunos' => ['required', 'integer'],
            'qtd_vagas_alunos_aee' => ['required', 'integer'],
            'turno_escolar_id' => ['required', 'integer'],
            
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
