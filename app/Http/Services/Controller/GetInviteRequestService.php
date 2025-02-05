<?php

namespace App\Http\Services\Controller;

use App\Http\Requests\GetInviteRequestRequest;
use App\Models\Proyek;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class GetInviteRequestService
{
    /**
     * @param GetInviteRequestRequest $request
     * @return JsonResponse
     */
    public function handle(GetInviteRequestRequest $request): JsonResponse
    {
        $idUser = Auth::id();

        $pendingRequest = Proyek::where(['status_terima_proyek', 0, 'id_controller', $idUser])->get();

        $data = ['dataPendingRequest' => $pendingRequest->toArray()];

        return response()->json(['data' => $data, 'message' => 'Data berhasil di ambil'], 200);
    }
}
