<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pws_pimpinan extends Model
{
    protected $table = 'pws_pimpinan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'tanggal',
        'bulan',
        'tahun',
        'nama_pegawai',
        'kegiatan',
        'hasil_kegiatan',
        'jam_mulai',
        'menit_mulai',
        'jam_selesai',
        'menit_selesai',
        'foto'
    ];
    public function getFoto(){
        if(!$this->foto){
          return asset('images/default.png');
        }
        return asset('images/pimpinan/pengawasan/foto/'.$this->foto);
    }
}
