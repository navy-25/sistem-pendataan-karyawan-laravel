<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catatan_admin extends Model
{
    protected $table = 'catatan_admin';
    protected $primaryKey = 'id';
    protected $fillable = [
        'admin_id',        
        'user_id',        
        'lpj_id',        
        'catatan',        
    ];
}
