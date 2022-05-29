<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|min:3|max:10',
            'content' => 'required|min:10|max:255',
            'image' => '',
            'category' => '',
            'tags' => 'required|array',
            'tags.*.title' => ''
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Заголовок - обязательно поле',
            'title.min' => 'Длина заголовока должна быть не меньше 3 символов',
            'title.max' => 'Длина заголовока должна быть не больше 10 символов',
            'content.required' => 'Контент - обязательное поле',
            'content.min' => 'Длина контента должна быть не меньше 10 символов',
            'content.max' => 'Длина контента должна быть не больше 255 символов',
        ];
    }
}
