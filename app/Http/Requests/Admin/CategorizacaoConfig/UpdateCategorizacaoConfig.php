<?php

namespace App\Http\Requests\Admin\CategorizacaoConfig;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateCategorizacaoConfig extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.categorizacao-config.edit', $this->categorizacaoConfig);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'categorizacao_item_id' => ['sometimes', 'integer'],
            'data_fim' => ['nullable', 'date'],
            'data_inicio' => ['nullable', 'date'],
            'nota_total' => ['nullable', 'integer'],
            'periodo_letivo_id' => ['sometimes', 'string'],
            
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
