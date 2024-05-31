<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class SearchCommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'query' => 'required|string|max:255'
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'query' => htmlspecialchars($this->query('query')),
        ]);
    }
}
