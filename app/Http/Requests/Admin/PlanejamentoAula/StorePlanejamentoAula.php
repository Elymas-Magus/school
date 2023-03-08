<?php

namespace App\Http\Requests\Admin\PlanejamentoAula;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StorePlanejamentoAula extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.planejamento-aula.create');
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
            'data_inicio' => ['required', 'date'],
            'disciplina_id' => ['required', 'string'],
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
