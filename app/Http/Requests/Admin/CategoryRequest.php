<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $categoryId = $this->route('category')?->id ?? $this->route('category');

        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'category_id' => [
                'nullable',
                'integer',
                'exists:categories,id',
                Rule::when($categoryId, Rule::notIn([$categoryId])),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The category name is required.',
            'name.string'   => 'The category name must be a string.',
            'name.max'      => 'The category name may not be greater than 255 characters.',

            'category_id.exists' => 'The selected parent category is invalid.',
            'category_id.not_in' => 'A category cannot be its own parent.',
        ];
    }
}
