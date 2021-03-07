<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dtp_kamtib extends Model
{
    protected $table = 'dtp_kamtib';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no',        
        'id_user',
        'tanggal',
        'bulan',
        'tahun',
        'nama_petugas',
        'tujuan',
        'deskripsi',
    ];
}
