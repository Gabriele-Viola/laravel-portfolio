<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'client' => 'required|string|max:255',
            'period_date' => 'required|date',
            'period_time' => 'required|date_format:H:i',
            'description' => 'required|string',
            'imageProject' => 'required|image|mimes:jpeg,png,jpg,svg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg, svg, gif,|max:2048',
            'technologies' => 'nullable|array',
            'technologies.*' => 'exists:technologies,id',

        ];
    }
    public function messages()
    {
        return [
            'title.required' => "project's Title is obligatory",
            'category_id.exists' => 'Choose a category',
            'cliet.required' => "The client can be yourself",
            'period_date.required' => 'Choose a starting Date',
            'period_time.required' => 'Choose a starting Time',
            'imageProject.required' => 'Choose at least one picture'
        ];
    }
}
