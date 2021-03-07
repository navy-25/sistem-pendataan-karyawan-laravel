<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dd_rap extends Model
{
    protected $table = 'dd_rap';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no',        
        'id_user',
        'nama_deteni',
        'tanggal',
        'bulan',
        'tahun',
        'no_identitas',
        'jenis_kelamin',
        'blok',
        'kewarganegaraan',
        'jenis_pelanggaran',
        'asal_kiriman',
        'foto',
    ];
    public function getFoto(){
        if(!$this->foto){
          return asset('images/default.png');
        }
        return asset('images/rap/dd/foto/'.$this->foto);
    }
}
