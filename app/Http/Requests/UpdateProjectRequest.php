<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'title' => ['required','string','unique:projects,id,' . $this->project->id],
            'type_id' => ['nullable','exists:types,id'],
            'technologies'=> ['nullable','exists:technologies,id'],
            'repo' => ['required','string', 'url'],
            'cover_image' => ['nullable','image'],
            'description' => ['required','string'],
        ];
    }
}