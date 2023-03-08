<?php

namespace App\Http\Requests\Admin\PlanejamentoAula;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdatePlanejamentoAula extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.planejamento-aula.edit', $this->planejamentoAula);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'conteudo' => ['nullable', 'string'],
            'data_fim' => ['nullable', 'date'],
            'data_inicio' => ['sometimes', 'date'],
            'disciplina_id' => ['sometimes', 'string'],
            'habilidades_competencias' => ['nullable', 'string'],
            'titulo' => ['nullable', 'string'],
            
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
