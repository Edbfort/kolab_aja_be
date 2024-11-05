<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ClientData
 *
 * @property int $id_pengguna             ID pengguna yang terkait
 * @property string $nama                 Nama lengkap pengguna
 * @property string $nomor_telepon        Nomor telepon pengguna
 * @property string $nama_perusahaan      Nama perusahaan pengguna
 * @property string $industri             Industri tempat perusahaan beroperasi
 * @property string $cangkupan_perusahaan Cangkupan atau skala perusahaan
 * @property string $waktu_buat           Waktu data dibuat
 * @property string $waktu_ubah           Waktu data diubah
 */
class ClientData extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'client_data';

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
        'nomor_telepon',
        'nama_perusahaan',
        'industri',
        'cangkupan_perusahaan',
        'waktu_buat',
        'waktu_ubah',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false; // Tidak mengaktifkan timestamp default Laravel

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        // Tidak perlu mengatur default untuk waktu_buat dan waktu_ubah karena diatur oleh database
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Di sini, tidak perlu mengatur waktu_buat karena sudah diatur oleh database
        });

        static::updating(function ($model) {
            // Di sini, mengatur waktu_ubah karena sudah diatur oleh database
            $model->waktu_ubah = $model->freshTimestamp();
        });
    }
}
