<?php

namespace App\Http\Requests\Admin\CursoGrade;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreCursoGrade extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.curso-grade.create');
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
            'bol_optativa' => ['nullable', 'boolean'],
            'carga_horaria' => ['nullable', 'integer'],
            'color' => ['required', 'string'],
            'curso_id' => ['required', 'string'],
            'descricao' => ['required', 'string'],
            'hora_aula' => ['nullable', 'integer'],
            'nome' => ['required', 'string'],
            'periodo' => ['nullable', 'integer'],
            
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
