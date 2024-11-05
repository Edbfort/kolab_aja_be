<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Pembayaran
 *
 * @property int $id_user                  ID pengguna yang melakukan pembayaran
 * @property float $nominal                Jumlah nominal pembayaran
 * @property int $id_tipe_pembayaran       ID jenis tipe pembayaran
 * @property string $tanggal_pembayaran     Tanggal pembayaran dilakukan
 * @property string $waktu_buat             Waktu saat entri pembayaran dibuat
 * @property string $waktu_ubah             Waktu saat entri pembayaran diubah
 */
class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $fillable = [
        'id_user',
        'nominal',
        'id_tipe_pembayaran',
        'tanggal_pembayaran',
        'waktu_buat',
        'waktu_ubah'
    ];

    public $timestamps = false;

    protected $casts = [
        'waktu_buat' => 'datetime',
        'waktu_ubah' => 'datetime',
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
