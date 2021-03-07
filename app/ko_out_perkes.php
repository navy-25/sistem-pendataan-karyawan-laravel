<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ko_out_perkes extends Model
{
    protected $table = 'ko_out_perkes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no',
        'id_user',
        'tanggal',
        'bulan',
        'tahun',
        'nama_obat',
        'kuantitas',
        'deskripsi'
    ];
}
