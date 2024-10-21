<?php

namespace App\Http\Services\Public;

use App\Models\Pengguna;
use App\Models\TransaksiPembuatanTeam;
use App\Models\User;
use App\Repositories\UserRolesRepository;
use Illuminate\Support\Facades\Auth;
use Validator;
use DateTime;

class UpdateProfileService
{
    public function handle($request)
    {
        $id = Auth::id();
        $parameter = $request->all();
        $user = User::where('id', $id)->first();
        $pengguna = Pengguna::where('id_user', $id)->first();
        if (isset($parameter['password'])) {
            $parameter['password'] = bcrypt($parameter['password']);
        }

        if ($user->email) {
            unset($parameter['email']);
        }

        if ($pengguna->nomor_telepon) {
            unset($parameter['nomor_telepon']);
        }

        if ($pengguna->fee) {
            unset($parameter['fee']);
        }

        $validasi = [
            'nama' => 'required',
            'password' => 'required',
            'lokasi' => 'required'
        ];

        $userRepo = new UserRolesRepository();
        $userRoles = $userRepo->findOneUserRolesAndNameByUserId($id);
        if ($userRoles) {
            if ($userRoles->nama_role == 'creative-hub-team') {
                $transaksiPembuatanTeam = TransaksiPembuatanTeam::where('id_user', $id)->first();
                $cha = User::where('id', $transaksiPembuatanTeam->id_cha)->first();
                $parameter['lokasi'] = $cha->lokasi;

                if ($transaksiPembuatanTeam->status_ganti_password) {
                    unset($parameter['password']);
                }

                $validasi['fee'] = 'required';
            } else {
                unset($parameter['password']);
            }

            if ($userRoles->nama_role != 'controller') {
                if ($userRoles->nama_role != 'creative-hub-team') {
                    $validasi['alamat'] = 'required';
                }
            } else {
                $validasi['fee'] = 'required';
            }

            if ($userRoles->nama_role == 'creative-hub-admin') {
                $validasi['website'] = 'required';
            }
        }

        $parameter['waktu_ubah'] = new DateTime();

        $user->update($parameter);
        $pengguna->update($parameter);

        $result = Pengguna::select(['*'])
            ->join('users', 'users.id', '=', 'pengguna.id_user')
            ->where('id_user', $id)
            ->first()->toArray();

        if (!is_null($result['email']) || !is_null($result['nomor_telepon'])) {
            if ($userRoles->nama_role == 'creative-hub-team' && !empty($parameter['password'])) {
                $transaksiPembuatanTeam = TransaksiPembuatanTeam::where('id_user', $id)->first();
                $transaksiPembuatanTeam->update([
                    'status_ganti_password' => 1,
                    'waktu_ubah' => new DateTime()
                ]);
            }

            $validator = Validator::make($result, $validasi);
            if (!$validator->fails()) {
                $statusPengguna = $result['id_status_pengguna'];
                if ($statusPengguna == 1 || $statusPengguna == 3) {
                    $statusPengguna = (int)$statusPengguna + 1;
                }

                $pengguna->update(['id_status_pengguna' => $statusPengguna]);
            }
        }

        return response()->json(['message' => 'Profile berhasil di update'], 200);
    }
}
