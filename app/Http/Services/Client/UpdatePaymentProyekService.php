<?php

namespace App\Http\Services\Client;

use App\Http\Utility\SmsUtility;
use App\Models\Pembayaran;
use App\Models\Proyek;
use Illuminate\Support\Facades\Auth;
use DateTime;

class UpdatePaymentProyekService
{
    public function handle($request)
    {
        $id = Auth::id();

        $proyek = Proyek::where([
            'id' => $request->id_proyek,
            'id_client' => $id,
            'id_status_proyek' => 3
        ])->first();

        if (!$proyek) {
            return response()->json(['message' => 'Gagal melakukan payment'], 422);
        }

        $data = Proyek::select([
            'pco.fee as controller_fee',
            'pt.fee as team_fee',
            'proyek.anggaran as anggaran'
        ])
            ->where([
                'proyek.id' => $request->id_proyek,
                'id_client' => $id,
                'id_status_proyek' => 3
            ])
            ->join('users as uco', 'uco.id', '=', 'proyek.id_controller')
            ->join('users as ut', 'ut.id', '=', 'proyek.id_team')
            ->join('pengguna as pco', 'pco.id_user', '=', 'uco.id')
            ->join('pengguna as pt', 'pt.id_user', '=', 'ut.id')
            ->get()->toArray()[0];

        $proyek->update([
            'controller_fee' => (int)$data['controller_fee'],
            'team_fee' => (int)$data['team_fee'],
            'waktu_ubah' => new DateTime(),
        ]);

        $pembayaran = Pembayaran::create([
            'id_user' => $id,
            'nominal' => floor(((int)$data['anggaran'] * (int)$data['controller_fee'] / 100) + (int)$data['team_fee']),
            'id_tipe_pembayaran' => 1,
            'waktu_buat' => new DateTime(),
            'waktu_ubah' => new DateTime(),
        ]);

        //Buang saat ada payment asli
        $pembayaran->update([
            'tanggal_pembayaran' => new DateTime(),
            'waktu_ubah' => new DateTime(),
        ]);

        $proyek->update([
            'status_lunas' => 1,
            'id_status_proyek' => 4,
            'waktu_ubah' => new DateTime(),
        ]);

        $response = [];
//        $response[] = SmsUtility::sendSms(
//            '6289604884108',
//            'Kamu telah lunas membayar pembuatan proyek "' .
//            $proyek->judul_proyek . '" dengan nominal Rp.' . $pembayaran->nominal
//        );

        return response()->json(['data' => $response,'message' => 'Payment berhasil dilakukan'], 200);
    }
}
