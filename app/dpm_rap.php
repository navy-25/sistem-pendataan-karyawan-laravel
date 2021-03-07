<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dpm_rap extends Model
{
    protected $table = 'dpm_rap';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no',        
        'id_user',
        'nama_pengungsi',
        'nomor_register',
        'no_unchcr',
        'jenis_kelamin',
        'tahun_registrasi',
        'tanggal',
        'bulan',
        'tahun',
        'alamat',
        'kewarganegaraan',
        'foto',
        'barcode',
    ];
    public function getFoto(){
        if(!$this->foto){
          return asset('images/default.png');
        }
        return asset('images/rap/dpm/foto/'.$this->foto);
    }
  
    public function getBarcode(){
      if(!$this->barcode){
        return asset('images/empty_barcode.png');
      }
      return asset('images/codeQR/'.$this->barcode);
  }
    public function getQrcode(){

      $qr_code = $this->id."-".$this->nomor_register;
      return $qr_code;
    }
}
