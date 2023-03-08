<?php

namespace App\Http\Requests\Admin\PeriodoLetivo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StorePeriodoLetivo extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.periodo-letivo.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'activated' => ['nullable', 'boolean'],
            'ano_referencia' => ['required', 'integer'],
            'carga_horaria' => ['nullable', 'integer'],
            'categorizacao_id' => ['nullable', 'integer'],
            'created_by' => ['required', 'integer'],
            'data_fim' => ['required', 'date'],
            'data_fim_rematricula' => ['nullable', 'date'],
            'data_inicio' => ['required', 'date'],
            'data_inicio_rematricula' => ['nullable', 'date'],
            'dias_letivos' => ['nullable', 'integer'],
            'escola_id' => ['required', 'string'],
            'media' => ['required', 'numeric'],
            'nome' => ['required', 'string'],
            'observacao' => ['required', 'string'],
            
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
