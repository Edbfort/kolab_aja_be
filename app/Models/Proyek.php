<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Proyek
 *
 * @property int $id_client                ID Client terkait dengan proyek
 * @property int $id_controller            ID Controller untuk proyek
 * @property int $id_team                  ID Tim yang mengerjakan proyek
 * @property string $judul_proyek          Judul proyek
 * @property string $deskripsi_proyek       Deskripsi proyek
 * @property string $spesialisasi          Spesialisasi yang dibutuhkan untuk proyek
 * @property float $controller_fee         Biaya untuk Controller
 * @property float $team_fee               Biaya untuk Tim
 * @property float $anggaran               Anggaran proyek
 * @property string $tanggal_tegat         Tanggal batas penyelesaian proyek
 * @property string $lokasi_dokumen        Lokasi dokumen terkait proyek
 * @property bool $status_lunas            Status lunas pembayaran proyek
 * @property string $perkembangan          Perkembangan proyek
 * @property int $id_status_proyek         ID Status proyek
 * @property string $waktu_buat            Waktu saat proyek dibuat
 * @property string $waktu_ubah            Waktu saat proyek diubah
 */
class Proyek extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'proyek';

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
        'id_client',
        'id_controller',
        'id_team',
        'judul_proyek',
        'deskripsi_proyek',
        'spesialisasi',
        'controller_fee',
        'team_fee',
        'anggaran',
        'tanggal_tegat',
        'lokasi_dokumen',
        'status_lunas',
        'perkembangan',
        'id_status_proyek',
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
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if ($model->exists) {
                // Set waktu_ubah to the current timestamp when updating a record
                $model->waktu_ubah = $model->freshTimestamp();
            } else {
                // Set waktu_buat to the current timestamp when creating a new record
                $model->waktu_buat = $model->freshTimestamp();
            }
        });
    }
}
