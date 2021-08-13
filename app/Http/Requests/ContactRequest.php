<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'required|max:255',
            'message' => 'required|max:500',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Имя'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле имя является обязательным',
            'name.max' => 'У поля имя максимальная длинна 255 символов',
            'email.required' => 'Поле email является обязательным',
            'email.email' => 'Поле email должно быть почтой',
            'subject.required' => 'Поле тема является обязательным',
            'subject.max' => 'У поля тема максимальная длинна 255 символов',
            'message.required' => 'Поле сообщение является обязательным',
            'message.max' => 'У поля сообщение максимальная длинна 500 символов',
        ];
    }
}
