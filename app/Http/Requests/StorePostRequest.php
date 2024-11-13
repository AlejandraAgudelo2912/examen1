<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'summary' => 'nullable|string|max:50',
            'slug' => 'nullable|string|unique:posts,slug',
            'status' => 'required|in:published,draft,archived,pending',
            'reading_time' => 'required|integer|min:1|max:60',
            'publish_at' => 'nullable|date',
        ];
    }
}
