<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'nullable|file',
            'main_image' => 'nullable|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The fill is required',
            'title.string' => 'Data must be of string type',
            'preview_image.required' => 'You need to select a file',
            'main_image.required' => 'The fill is required',
            'main_image.file' => 'You need to select a file',
            'category_id.required' => 'The fill is required',
            'category_id.integer' => 'Post id must be an integer',
            'tag_ids_array' => 'You need to send a data array',
        ];
    }
}
