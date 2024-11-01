<?php

namespace App\Http\Services\Controller;

use App\Http\Requests\InsertChangePasswordRequest;
use App\Http\Utility\UploadFileUtility;
use App\Models\DesignBreif;
use App\Models\Proyek;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Auth;

class InsertChangePasswordService
{
    public function handle(InsertChangePasswordRequest $request)
    {
        $idUser = Auth::id();

        $email = $request->validated('email');

        $password = $request->validated('password');

        $oldPassword = $request->validated('old_password');

        $user = User::where('id', $idUser)->first();

        $credentials = [
            'email' => $email,
            'password' => $oldPassword
        ];

        if (auth()->attempt($credentials)) {
            return response()->json(['errors' => 'Username/ Password salah'], 401);
        }

        $user->update([
            'password' => bcrypt($password)
        ]);


        return response()->json(['message' => 'Password berhasil di ubah']);
;
    }
}
