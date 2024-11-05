<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DesignBreif
 *
 * @property int $id_controller        ID controller yang terkait
 * @property int $id_proyek            ID proyek yang terkait
 * @property string $link_meeting      Link untuk rapat online
 * @property string $lokasi_dokumen    Lokasi dokumen yang terkait
 * @property string $status            Status dari design brief
 * @property string $waktu_buat        Waktu saat data dibuat
 * @property string $waktu_ubah        Waktu saat data diubah
 */
class DesignBreif extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'design_breif';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_controller',
        'id_proyek',
        'link_meeting',
        'lokasi_dokumen',
        'status',
        'waktu_buat',
        'waktu_ubah'
    ];

}
