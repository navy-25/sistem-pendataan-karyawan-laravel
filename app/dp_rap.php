<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dp_rap extends Model
{
    protected $table = 'dp_rap';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no',        
        'id_user',
        'nama_pengungsi',
        'nomor_register',
        'no_unchcr',
        'jenis_kelamin',
        'tanggal',
        'bulan',
        'tahun',
        'tempat_penampungan',
        'tahun_registrasi',
        'kamar',
        'kewarganegaraan',
        'foto',
        'barcode',
    ];
    public function getFoto(){
        if(!$this->foto){
          return asset('images/default.png');
        }
        return asset('images/rap/dp/foto/'.$this->foto);
    }
    public function getBarcode(){
        if(!$this->barcode){
          return asset('images/empty_barcode.png');
        }
        return asset('images/codeQR/'.$this->barcode);
    }
    public function getQrcode(){

      $qr_code = $this->nomor_register;
      return $qr_code;
    }
    public function lapor(){ 
      return $this->hasMany(lp_rap::class); 
  }
}
