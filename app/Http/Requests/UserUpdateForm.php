<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class UserUpdateForm extends FormRequest
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
            'login_user_email' => ['required', 'string', 'email', 'max:50'], // Rule::unique('tb_login_users')->ignore(Auth::guard('api')->user()->login_users_id)
            'first_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'],
            'login_user_roles_id' => ['required'],
            'organization_id' => ['required'],
        ];
    }

    /**
     *
     */
    public function attributes()
    {
        return [
            'login_user_email' => 'ログインユーザーメール',
            'first_name' => 'ファーストネーム',
            'last_name' => 'ラストネーム',
            'login_user_roles_id' => 'ログインユーザーロール',
            'organization_id' => 'オーガニゼーション',
        ];
    }

    /**
     * This is to response JSON if fail validations.
     * @param Validator $validator
     * @return Response error json response
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        throw new HttpResponseException(
            response()->json(['errors' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
