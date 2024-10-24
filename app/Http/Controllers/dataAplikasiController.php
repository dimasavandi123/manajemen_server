<?php

namespace App\Http\Controllers;

use App\Models\dataVm;
use App\Models\dataAplikasi;
use Illuminate\Http\Request;
use PDF;
class dataAplikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
        $dataVm = dataVm::all();
    
       
        $data_vm_id = $request->input('data_vm_id');
    
      
        if ($data_vm_id) {
            $dataAplikasi = dataAplikasi::where('data_vm_id', $data_vm_id)->paginate(10);
        } else {
        
            $dataAplikasi = dataAplikasi::paginate(10);
        }
    
        return view('data-aplikasi.index', compact('dataAplikasi', 'dataVm'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    
    {
        $dataVm = dataVm::all(); 
        $dataAplikasi = dataAplikasi::all();
        return view('data-aplikasi.create',compact('dataAplikasi','dataVm'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $request->validate([
            'data_vm_id' => 'required|exists:data_vm,id',
            'nama_aplikasi' => 'required|string|max:255',
            'nama_opd' => 'required|string|max:255',
            'url_aplikasi' => 'required',
            'pass_aplikasi' => 'required|string|max:255',
            'versi_php' => 'required|string|max:50',
            'keterangan_pic' => 'required',
            'port_aplikasi' => 'required|integer',
            'status' => 'required|in:Aktif,Nonaktif',
        ], [
          
            'status.in' => 'Status harus diisi dengan Aktif atau Nonaktif.',
        ]);
    
  
        $dataAplikasi = new dataAplikasi;
        $dataAplikasi->data_vm_id = $request->data_vm_id;
        $dataAplikasi->nama_aplikasi = $request->nama_aplikasi;
        $dataAplikasi->nama_opd = $request->nama_opd;
        $dataAplikasi->url_aplikasi = $request->url_aplikasi;
        $dataAplikasi->pass_aplikasi = $request->pass_aplikasi;
        $dataAplikasi->versi_php = $request->versi_php;
        $dataAplikasi->keterangan_pic = $request->keterangan_pic;
        $dataAplikasi->port_aplikasi = $request->port_aplikasi;
        $dataAplikasi->status = $request->status;
        $dataAplikasi->save();
    
      
        return to_route('data-aplikasi.index')->with('success', 'Data Aplikasi Berhasil Ditambah');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataVm = dataVm::all(); 
        $dataAplikasi = dataAplikasi::find($id);
        return view('data-aplikasi.show',compact('dataAplikasi','dataVm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataVm = dataVm::all(); 
        $dataAplikasi = dataAplikasi::find($id);
        return view('data-aplikasi.edit',compact('dataAplikasi','dataVm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'data_vm_id' => 'required|exists:data_vm,id',
            'nama_aplikasi' => 'required|string|max:255',
            'nama_opd' => 'required|string|max:255',
            'url_aplikasi' => 'required',
            'pass_aplikasi' => 'required|string|max:255',
            'versi_php' => 'required|string|max:50',
            'keterangan_pic' => 'required',
            'port_aplikasi' => 'required|integer',
            'status' => 'required|in:Aktif,Nonaktif',
        ], [
          
            'status.in' => 'Status harus diisi dengan Aktif atau Nonaktif.',
        ]);
    
  
        $dataAplikasi = dataAplikasi::find($id);
        $dataAplikasi->data_vm_id = $request->data_vm_id;
        $dataAplikasi->nama_aplikasi = $request->nama_aplikasi;
        $dataAplikasi->nama_opd = $request->nama_opd;
        $dataAplikasi->url_aplikasi = $request->url_aplikasi;
        $dataAplikasi->pass_aplikasi = $request->pass_aplikasi;
        $dataAplikasi->versi_php = $request->versi_php;
        $dataAplikasi->keterangan_pic = $request->keterangan_pic;
        $dataAplikasi->port_aplikasi = $request->port_aplikasi;
        $dataAplikasi->status = $request->status;
        $dataAplikasi->save();
    
      
        return to_route('data-aplikasi.index')->with('success', 'Data Aplikasi Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataAplikasi = dataAplikasi::find($id);

        if($dataAplikasi){
            $dataAplikasi->delete();
            return response()->json(['success' => 'Data Berhasil Dihapus']);
        }else{
            return response()->json(['error' => 'Data Tidak Ditemukan'],404);
        }
    }



public function cetakPdfPerId($id)
{
    $dataAplikasi = dataAplikasi::with('dataVm')->findOrFail($id);

    $pdf = PDF::loadView('data-aplikasi.cetak-pdf-per-id', compact('dataAplikasi'))->setPaper('a4', 'portrait');
    
    return $pdf->download('data-aplikasi-'.$dataAplikasi->nama_aplikasi.'.pdf');
}


public function cetakPdf(Request $request)
{
    // Ambil data VM untuk filter
    $dataVm = dataVm::all();
    
    // Cek apakah ada filter yang diterapkan
    $query = dataAplikasi::query();
    
    if ($request->has('data_vm_id') && $request->data_vm_id != '') {
        // Filter berdasarkan data_vm_id
        $query->where('data_vm_id', $request->data_vm_id);
    }
    
    $dataAplikasi = $query->get();

    // Generate PDF menggunakan view khusus untuk PDF
    $pdf = PDF::loadView('data-aplikasi.cetak-pdf', compact('dataAplikasi', 'dataVm'))
               ->setPaper('a4', 'landscape');

    return $pdf->download('data-aplikasi.pdf');
}


}
