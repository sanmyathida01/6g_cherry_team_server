<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;

class TeamsPostForm extends FormRequest
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
    public function rules() //テキストボックスの中身
    {
        return [
            'from_user_id' => ['required'],
            'to_user_id' => ['required'],
            'content' => ['required'],
            'teams_categories_id' => ['required'],
        ];
    }

    /**
     *
     */
    public function attributes() //エラー時の表記
    {
        return [
            'from_user_id' => '投稿者',
            'to_user_id' => '誰に',
            'content' => '投稿内容',
            'teams_categories_id' =>'TEAMSカテゴリー',
        ];
    }

    /**
     * This is to response JSON if fail validations.
     * @param Validator $validator
     * @return Response error json response
     */
    //以下はエラーを表示するための処理
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        throw new HttpResponseException(
            response()->json(['errors' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}