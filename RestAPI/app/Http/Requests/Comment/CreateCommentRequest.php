<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class CreateCommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_name' => 'required|string|max:50|regex:/^[a-z0-9]+$/i',
            'email' => 'required|email',
            'home_page' => 'nullable|url',
            'text' => 'required',
            'parent_id' => 'nullable|exists:comments,id',
            'author_id' => 'nullable|exists:users,id'
        ];
    }

    protected function prepareForValidation(): void
    {
        $allowedTags = '<p><a><br><strong><em>';

        $this->merge([
            'user_name' => htmlspecialchars($this->user_name),
            'email' => htmlspecialchars($this->email),
            'home_page' => htmlspecialchars($this->home_page),
            'text' => strip_tags($this->text, $allowedTags),
        ]);
    }
}
