<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTagRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'tag' => ['required', 'string', 'min:5'],
            'message' => ['required', 'string', 'min:5'],
            'type' => ['required', 'string', 'in:commit,tree,blob', 'min:5'],
            'object' => ['required', 'string', 'min:5'],
            'owner' => ['required', 'string', 'min:5'],
            'repo' => ['required', 'string', 'min:5'],
        ];
    }
}
