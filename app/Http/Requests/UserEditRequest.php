<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UserEditRequest extends FormRequest
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
        $user_id = $this->route()->parameter('user');
        return [
            'name'  => ['required', Rule::unique('users')->ignore($user_id)],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user_id),
            ],
            'avatar' =>  'nullable|image|max:2084'
        ];
    }
}
