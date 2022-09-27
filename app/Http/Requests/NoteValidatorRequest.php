<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteValidatorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'content' => 'required',
            'color' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => "Add a title to your notes",
            'content.required' => "Add some content to your notes",
            'color.required' => 'Select a color for your note'
        ];
    }
}
