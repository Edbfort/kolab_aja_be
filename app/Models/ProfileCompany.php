<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProfileCompany
 *
 * @property int $id_pengguna                ID pengguna yang terkait dengan profil perusahaan
 * @property string $nama                     Nama perusahaan
 * @property string $tag_line                 Tagline perusahaan
 * @property int $jumlah_working_space        Jumlah ruang kerja
 * @property string $nomor_telepon            Nomor telepon perusahaan
 * @property string $alamat                   Alamat perusahaan
 * @property string $website                  Website perusahaan
 * @property string $deskripsi                Deskripsi perusahaan
 * @property string $visi_misi                Visi dan misi perusahaan
 * @property string $waktu_buat               Waktu saat profil perusahaan dibuat
 * @property string $waktu_ubah               Waktu saat profil perusahaan diubah
 */
class ProfileCompany extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'profile_company';

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
        'id_pengguna',
        'nama',
        'tag_line',
        'jumlah_working_space',
        'nomor_telepon',
        'alamat',
        'website',
        'deskripsi',
        'visi_misi',
        'waktu_buat',
        'waktu_ubah',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Define a relationship with the Pengguna model.
     */
    public function idPengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id');
    }
}
