<?php

namespace App\Http\Requests;

use App\Repositories\UserRolesRepository;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class InsertChangePasswordRequest extends FormRequest
{
    public function authorize()
    {

    }

    public function rules()
    {
        return [
            'email' => ['int', 'required', 'exsist:user,email'],
            'passowrd' => ['string', 'required'],
            'old_password' => ['string', 'required']
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = [
            'message' => 'Validasi gagal',
            'errors' => $validator->errors(),
        ];

        throw new ValidationException($validator, response()->json($response, 422));
    }
}
