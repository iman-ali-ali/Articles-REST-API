<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:20', 'unique:articles,title,except,'.$this->article->title],
            // 'title' => ['required', 'max:20', Rule::unique('articles', 'title')->ignore($user->id)],
            'body' => ['required', 'min:5'],
        ];
    }
}