<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lp_rap extends Model
{
    protected $table = 'lp_rap';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no',
        'id_user',
        'tanggal',
        'nama_pengungsi',
        'lapor',
        'dp_rap_id',
        'dpm_rap_id',
        'status',
        'code',
        
    ];       
    public function dp_rap(){
    	return $this->belongsTo(dp_rap::class,'ad_rap_id');
    }
}
