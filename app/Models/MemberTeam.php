<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MemberTeam
 *
 * @property int $id_team        ID tim yang menjadi anggota
 * @property string $nama        Nama anggota tim
 * @property string $jabatan     Jabatan anggota dalam tim
 * @property string $role_team    Peran anggota dalam tim
 * @property string $waktu_buat   Waktu saat lamaran dibuat
 * @property string $waktu_ubah   Waktu saat lamaran diubah
 */
class MemberTeam extends Model
{
    use HasFactory;

    protected $table = 'member_team';

    protected $fillable = [
        'id_team',
        'nama',
        'jabatan',
        'role_team',
        'waktu_buat',
        'waktu_ubah'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'waktu_buat';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'waktu_ubah';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'waktu_buat' => 'datetime',
        'waktu_ubah' => 'datetime',
    ];
}
