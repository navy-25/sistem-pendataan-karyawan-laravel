<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ptk_pimpinan extends Model
{
    protected $table = 'ptk_pimpinan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'nama_kegiatan',
        'tanggal',
        'bulan',
        'tahun',
        'tempat',
        'persiapan',
        'penanggung_jawab',
        'status',
    ];
}
