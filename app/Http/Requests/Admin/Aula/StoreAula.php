<?php

namespace App\Http\Requests\Admin\Aula;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreAula extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.aula.create');
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
            'disciplina_id' => ['required', 'string'],
            'escola_id' => ['required', 'string'],
            'link_transmissao' => ['nullable', 'string'],
            'observacoes' => ['nullable', 'string'],
            'periodo_letivo_id' => ['required', 'string'],
            'planejamento_id' => ['nullable', 'string'],
            'plataforma_id' => ['nullable', 'integer'],
            'professor_id' => ['nullable', 'string'],
            'replica_id' => ['nullable', 'string'],
            'titulo' => ['required', 'string'],
            
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
