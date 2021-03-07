<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class adk_kamtib extends Model
{
    protected $table = 'adk_kamtib';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no',        
        'id_user',        
        'nama',        
        'ukuran',        
        'file',
    ];
    public function getFiles(){      
        return asset('files/kamtib/adk/'.$this->nama);
    }
    
}
