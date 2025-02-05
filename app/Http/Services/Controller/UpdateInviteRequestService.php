<?php

namespace App\Http\Services\Controller;

use App\Http\Requests\UpdateInviteRequestRequest;
use App\Models\Proyek;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use Illuminate\Http\JsonResponse;

class UpdateInviteRequestService
{
    /**
     * @param UpdateInviteRequestRequest $request
     * @return JsonResponse
     */
    public function handle(UpdateInviteRequestRequest $request): JsonResponse
    {
        $idUser = Auth::id();
        $idProyek = $request->validated('id');
        $statusTerimaProyek = $request->validated('status_terima_proyek');

        try {
            DB::connection();
            DB::beginTransaction();

            $proyek = Proyek::where(['id' => $idProyek, 'id_controller' => $idUser])->first();
            if (!$proyek) {
                return response()->json(['errors' => 'Data proyek tidak di temukan'], 404);
            }

            if ($statusTerimaProyek) {
                $proyek->update(['status_terima_proyek' => $statusTerimaProyek]);
            } else {
                $proyek->update(['status_terima_proyek' => $statusTerimaProyek, 'id_controller' => null]);
            }

            DB::commit();

            if ($statusTerimaProyek) {
                return response()->json(['message' => 'Undangan berhasil di terima'], 200);
            }
            return response()->json(['message' => 'Undangan berhasil di tolak'], 200);
        } catch (Exception $e) {
            return response()->json(['errors' => 'Terjadi kesalahan saat menyimpan data mohon hubungi IT Support Kami'], 500);
        }
    }
}
