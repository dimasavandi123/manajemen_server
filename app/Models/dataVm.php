<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataVm extends Model
{
    use HasFactory;
    protected $table = 'data_vm';
    protected $guarded = ['id'];
    protected $fillable = ['nama_vm','os_vm','ip_public_vm','ip_local_vm'];

    public function serverData()
    {
        return $this->belongsTo(serverData::class);
    }

    public function dataAplikasi(){
        return $this->hasMany(dataAplikasi::class,'data_aplikasi_id','id');
    }
}
