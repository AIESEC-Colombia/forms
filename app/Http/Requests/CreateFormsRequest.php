<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormsRequest extends FormRequest
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
            'first_name' => 'sometimes|required|string',
            'last_name' => 'sometimes|required|string',
            'phone' => 'sometimes|required|numeric',
            'cellphone' => 'sometimes|required|numeric',
            'mail' => 'sometimes|required|email',
            'university' => 'sometimes|required',
            'password' => 'sometimes|required|confirmed|regex:/^(?=.*\d)(?=.*[a-zA-Z]).{8,16}$/',
            'password_confirmation' => 'sometimes|required',
            'organization' => 'sometimes|required',
            'activities' => 'sometimes|required',
            'travel_date' => 'sometimes|required',
            'preference_contact' => 'sometimes|required',
            'english_level' => 'sometimes|required',
            'experience' => 'sometimes|required',
            'career' => 'sometimes|required',
            'semester' => 'sometimes|required',
            'terms' => 'sometimes|required',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'El ' . __('forms.first_name') . ' es requerido.',
            'first_name.string' => 'Ingrese un ' . __('forms.first_name') . ' valido.',
            'last_name.required' => 'El ' . __('forms.last_name') . ' es requerido.',
            'last_name.string' => 'Ingrese un ' . __('forms.last_name') . ' valido.',
            'phone.required' => 'El ' . __('forms.phone') . ' es requerido.',
            'phone.numeric' => 'El ' . __('forms.phone') . ' no es un número.',
            'cellphone.required' => 'El ' . __('forms.cellphone') . ' es requerido.',
            'cellphone.numeric' => 'El ' . __('forms.cellphone') . ' no es un número.',
            'mail.required' => 'El ' . __('forms.mail') . ' es requerido.',
            'mail.email' => 'Ingrese un ' . __('forms.mail') . ' valido.',
            'university.required' => 'La ' . __('forms.university') . ' es requerida.',
            'password.required' => 'La ' . __('forms.password') . ' es requerida.',
            'password.regex' => 'La ' . __('forms.password') . ' debe ser entre 8 y 16 caracteres, debe contener numeros y letras.',
            'password_confirmation.required' => 'La ' . __('forms.password_confirmation') . '  es requerido.',
            'password.confirmed' => 'La ' .  __('forms.password_confirmation') . ' no coincide.',
            'organization.required' => __('forms.organization') . ' es requerida.',
            'activities.required' => 'El ' . __('forms.activities') . ' es requerida.',
            'travel_date.required' => 'La ' . __('forms.travel_date') . ' es requerida.',
            'preference_contact.required' => 'La ' . __('forms.preference_contact') . ' es requerida.',
            'english_level.required' => 'La ' . __('forms.english_level') . ' es requerida.',
            'experience.required' => 'La ' . __('forms.experience') . ' es requerida.',
            'career.required' => __('forms.career') . ' es requerido.',
            'semester.required' => __('forms.semester') . ' es requerido.',
            'terms.required' => 'Debe aceptar los' . __('forms.terms'),
        ];

    }
}
