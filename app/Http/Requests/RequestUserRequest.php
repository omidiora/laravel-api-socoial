<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Models\User;

class RequestUserRequest extends FormRequest
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

    public function rules() {
        return [
            'name'=>'required|min:4|max:100',
            'email'=>'required|unique:users,email',
            'password'=>'required|confirmed',
        ];
     }
 



    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */


    protected function failedValidation(Validator $validator)
{
    throw new HttpResponseException(response()->json([
      'errors' => $validator->errors(),
      'status' => false
    ], 422));
}
}
