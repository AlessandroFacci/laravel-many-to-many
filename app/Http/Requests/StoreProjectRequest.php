<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required','string','unique:projects'],
            'type_id' => ['nullable','exists:types,id'],
            'repo' => ['required','string', 'url'],
            'description' => ['required','string'],
        ];
    }
}