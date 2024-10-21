<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPembuatanTeam extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transaksi_pembuatan_team';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user',
        'id_cha',
        'temp_password',
        'status_ganti_password',
        'waktu_buat	',
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

    public function idUser()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function idCha()
    {
        return $this->belongsTo(User::class, 'id_cha', 'id');
    }
}
