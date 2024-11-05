<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pengguna
 *
 * @property int $id_user                  ID pengguna yang terkait
 * @property string $nomor_telepon         Nomor telepon pengguna
 * @property string $alamat                 Alamat pengguna
 * @property string $profil_detail          Detail profil pengguna
 * @property string $website                Website pengguna
 * @property string $tag_line               Tagline pengguna
 * @property string $spesialisasi           Spesialisasi pengguna
 * @property string $media_sosial           Media sosial pengguna
 * @property float $fee                     Fee yang dikenakan kepada pengguna
 * @property int $id_status_pengguna        ID status pengguna
 * @property string $waktu_buat             Waktu saat entri pengguna dibuat
 * @property string $waktu_ubah             Waktu saat entri pengguna diubah
 */
class Pengguna extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pengguna';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user',
        'nomor_telepon',
        'alamat',
        'profil_detail',
        'website',
        'tag_line',
        'spesialisasi',
        'media_sosial',
        'fee',
        'id_status_pengguna',
        'waktu_buat',
        'waktu_ubah'
    ];

    /**
     * Define relationship with User model.
     */
    public function idUser()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    /**
     * Define relationship with StatusPengguna model.
     */
    public function idStatusPengguna()
    {
        return $this->belongsTo(StatusPengguna::class, 'id_status_pengguna', 'id');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'waktu_ubah' => 'datetime', // You can keep this if you still want to use datetime for waktu_ubah
        // Remove 'waktu_buat' from here to treat it as a string
    ];
}
