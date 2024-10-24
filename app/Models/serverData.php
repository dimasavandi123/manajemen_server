<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serverData extends Model
{
    protected $table = 'server_data';
    protected $guarded = ['id'];

    protected $fillable = [
        'merk_server',
        'ip_server',
        'keterangan',

    ];
    
    public function dataVm()
    {
        return $this->hasMany(dataVm::class,'data_server_id','id');
    }
}
