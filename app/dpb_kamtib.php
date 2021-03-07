<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dpb_kamtib extends Model
{
    protected $table = 'dpb_kamtib';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no',        
        'id_user',
        'tanggal',
        'bulan',
        'tahun',
        'nama_deteni',
        'blok',
        'jenis_pelanggaran',
        'foto',
        'kasus',
    ];
    public function getDokumentasi(){
        if(!$this->foto){
          return asset('images/default.png');
        }
        return asset('images/kamtib/dpb/'.$this->foto);
    }
}