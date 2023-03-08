<?php

namespace App\Http\Requests\Admin\Aula;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateAula extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.aula.edit', $this->aula);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'bol_online' => ['nullable', 'boolean'],
            'categorizacao_item_id' => ['nullable', 'integer'],
            'data_fim' => ['nullable', 'date'],
            'data_inicio' => ['nullable', 'date'],
            'disciplina_id' => ['sometimes', 'string'],
            'escola_id' => ['sometimes', 'string'],
            'link_transmissao' => ['nullable', 'string'],
            'observacoes' => ['nullable', 'string'],
            'periodo_letivo_id' => ['sometimes', 'string'],
            'planejamento_id' => ['nullable', 'string'],
            'plataforma_id' => ['nullable', 'integer'],
            'professor_id' => ['nullable', 'string'],
            'replica_id' => ['nullable', 'string'],
            'titulo' => ['sometimes', 'string'],
            
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
