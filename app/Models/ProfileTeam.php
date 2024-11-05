<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProfileTeam
 *
 * @property int $id_creative_hub            ID Creative Hub terkait dengan profil tim
 * @property int $id_pengguna                 ID pengguna yang terkait dengan profil tim
 * @property string $deskripsi                Deskripsi tim
 * @property string $nama_team                 Nama tim
 * @property string $skillset                 Keterampilan yang dimiliki oleh tim
 * @property string $waktu_buat               Waktu saat profil tim dibuat
 * @property string $waktu_ubah               Waktu saat profil tim diubah
 */
class ProfileTeam extends Model
{
    use HasFactory;

    protected $table = 'profile_team';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_creative_hub',
        'id_pengguna',
        'deskripsi',
        'nama_team',
        'skillset',
        'waktu_buat',
        'waktu_ubah'
    ];

    public $timestamps = false;
}
