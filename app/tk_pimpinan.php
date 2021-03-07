<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tk_pimpinan extends Model
{
    protected $table = 'tk_pimpinan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'nama_kegiatan',
        'tanggal',
        'bulan',
        'tahun',
        'tempat',
        'konsep',
        'dasar',
        'status',
    ];
}
