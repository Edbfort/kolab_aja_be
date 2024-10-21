<?php

namespace App\Http\Services\Client;

use App\Models\BillingClient;
use App\Models\ClientData;
use App\Models\Pengguna;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class UpdateBillingClientService
{
    public function handle($request)
    {
        $billingClient = BillingClient::where('id_user', Auth::id())->first();

        $pengguna = Pengguna::where('id_user', Auth::id())->first();

        $bulan = (string)$request->bulan;
        $habisBerlaku = $request->tahun . "-" . (str_repeat('0', max(0, 2 - strlen($bulan)))) . $bulan;

        if (!$billingClient) {
            BillingClient::create([
                'id_user' => Auth::id(),
                'nomor_kartu' => $request->nomor_kartu,
                'nama_depan' => $request->nama_depan,
                'nama_belakang' => $request->nama_belakang,
                'habis_berlaku' => $habisBerlaku,
                'cvv' => $request->cvv,
                'waktu_buat' => new \DateTime(),
                'waktu_ubah' => new \DateTime(),
            ]);
        } else {
            $billingClient->update([
                'nomor_kartu' => $request->nomor_kartu,
                'nama_depan' => $request->nama_depan,
                'nama_belakang' => $request->nama_belakang,
                'habis_berlaku' => $habisBerlaku,
                'cvv' => $request->cvv,
                'waktu_ubah' => new \DateTime(),
            ]);
        }

        if ($pengguna->id_status_pengguna == 2) {
            $pengguna->update([
               'id_status_pengguna' => 4
            ]);
        }

        return response()->json(['message' => 'Billing info berhasil di update'], 200);
    }
}
