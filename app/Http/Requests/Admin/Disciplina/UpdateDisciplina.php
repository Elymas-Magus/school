<?php

namespace App\Http\Requests\Admin\Disciplina;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateDisciplina extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.disciplina.edit', $this->disciplina);
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
            'carga_horaria' => ['nullable', 'integer'],
            'curso_grade_id' => ['sometimes', 'string'],
            'descricao' => ['sometimes', 'string'],
            'hora_aula' => ['nullable', 'integer'],
            'nome' => ['sometimes', 'string'],
            'periodo_letivo_id' => ['sometimes', 'string'],
            'professor_id' => ['sometimes', 'string'],
            'turma_id' => ['sometimes', 'string'],
            
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
