<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRepositoriesRequest extends FormRequest
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

  public function attributes()
  {
    return [
        'q' => 'search'
    ];
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
        'q' => ['required', 'string', 'min:2', 'max:150'],
        'sort' => ['required', 'string', 'in:stars,created'],
        'direction' => ['required', 'string', 'in:asc,desc'],
    ];
  }
}
