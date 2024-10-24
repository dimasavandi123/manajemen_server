<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataAplikasi extends Model
{
    use HasFactory;
    protected $table = 'data_aplikasi';
    protected $guarded = ['id'];

    protected $fillable = ['data_vm_id','nama_aplikasi','nama_opd','url_aplikasi','pass_aplikasi','versi_php','keterangan_pic','port_aplikasi','status',
    ];

    public function dataVm()
    {
        return $this->belongsTo(dataVm::class,'data_vm_id');
    }
}
