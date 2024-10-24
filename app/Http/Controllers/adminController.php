<?php

namespace App\Http\Controllers;

use App\Models\dataVm;
use App\Models\serverData;
use App\Models\dataAplikasi;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        $jumlahServer = serverData::count();
        $jumlahVm = dataVm::count();
        $jumlahAplikasi = dataAplikasi::count();
        $jumlahData = $jumlahServer + $jumlahVm + $jumlahAplikasi;
        return view('dashboard.index',compact('jumlahServer','jumlahVm','jumlahAplikasi','jumlahData'));
    }
}
