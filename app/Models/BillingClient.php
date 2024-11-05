<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Class BillingClient
 *
 * @property int $id_user           ID pengguna
 * @property string $nomor_kartu    Nomor kartu
 * @property string $nama_depan     Nama depan
 * @property string $nama_belakang  Nama belakang
 * @property string $habis_berlaku  Tanggal kedaluwarsa kartu
 * @property string $cvv            Kode CVV
 * @property string $waktu_buat     Waktu data dibuat
 * @property string $waktu_ubah     Waktu data diubah
 */
class BillingClient extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'billing_client';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user',
        'nomor_kartu',
        'nama_depan',
        'nama_belakang',
        'habis_berlaku',
        'cvv',
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
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [

    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
        });

        static::updating(function ($model) {
            $model->waktu_ubah = $model->freshTimestamp();
        });
    }
}

