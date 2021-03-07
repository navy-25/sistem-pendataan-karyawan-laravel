<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kd_perkes extends Model
{
    protected $table = 'kd_perkes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no',
        'id_user',
        'tanggal',
        'bulan',
        'tahun',
        'nama_penerima',
        'jenis_kebutuhan',
        'deskripsi'
    ];
}
