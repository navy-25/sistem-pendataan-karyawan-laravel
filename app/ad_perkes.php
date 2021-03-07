<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ad_perkes extends Model
{
    protected $table = 'ad_perkes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no',        
        'id_user',        
        'nama',        
        'ukuran',        
        'file',
    ];
    public function getFiles(){      
        return asset('files/perkes/adp/'.$this->nama);
    }
}
