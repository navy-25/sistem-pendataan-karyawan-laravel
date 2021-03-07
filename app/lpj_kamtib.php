<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lpj_kamtib extends Model
{
    protected $table = 'lpj_kamtib';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'tanggal',
        'bulan',
        'tahun',
        'nama_petugas',
        'jam_mulai',
        'menit_mulai',
        'jam_selesai',
        'menit_selesai',
        'deskripsi',
        'catatan'
    ];
}
