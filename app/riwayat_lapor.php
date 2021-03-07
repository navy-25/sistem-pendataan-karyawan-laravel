<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class riwayat_lapor extends Model
{
    protected $table = 'riwayat_lapor';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'nama',
        'tanggal',
    ];
    
}
