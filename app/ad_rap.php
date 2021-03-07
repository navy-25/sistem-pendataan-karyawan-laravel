<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ad_rap extends Model
{
    protected $table = 'ad_rap';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no',        
        'id_user',        
        'nama',        
        'ukuran',        
        'file',
    ];
    public function getFiles(){      
        return asset('files/rap/adrap/'.$this->nama);
    }
}
