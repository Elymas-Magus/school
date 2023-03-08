<?php

namespace App\Http\Requests\Admin\PeriodoLetivo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdatePeriodoLetivo extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.periodo-letivo.edit', $this->periodoLetivo);
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
            'ano_referencia' => ['sometimes', 'integer'],
            'carga_horaria' => ['nullable', 'integer'],
            'categorizacao_id' => ['nullable', 'integer'],
            'created_by' => ['sometimes', 'integer'],
            'data_fim' => ['sometimes', 'date'],
            'data_fim_rematricula' => ['nullable', 'date'],
            'data_inicio' => ['sometimes', 'date'],
            'data_inicio_rematricula' => ['nullable', 'date'],
            'dias_letivos' => ['nullable', 'integer'],
            'escola_id' => ['sometimes', 'string'],
            'media' => ['sometimes', 'numeric'],
            'nome' => ['sometimes', 'string'],
            'observacao' => ['sometimes', 'string'],
            
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
