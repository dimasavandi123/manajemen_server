<?php

namespace App\Http\Controllers;

use App\Models\dataVm;
use App\Models\serverData;
use Illuminate\Http\Request;

class dataVmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataVm = dataVm::paginate(10); 
        return view('data-vm.index',compact('dataVm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serverData = serverData::all();
        return view('data-vm.create',compact('serverData'));
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
            'server_data_id' => 'required|exists:server_data,id',
            'nama_vm' => 'required|string|max:255',
            'os_vm' => 'required|string|max:255',
            'ip_public_vm' => 'required|ip|unique:data_vm,ip_public_vm',
            'ip_local_vm' => 'required|ip|unique:data_vm,ip_local_vm',
        ], [
            'ip_public_vm.unique' => 'IP Publik sudah digunakan. Silakan masukkan IP yang berbeda.',
            'ip_local_vm.unique' => 'IP Lokal sudah digunakan. Silakan masukkan IP yang berbeda.',
        ]);
    
        $dataVm = new dataVm;
        $dataVm->server_data_id = $request->server_data_id;
        $dataVm->nama_vm = $request->nama_vm;
        $dataVm->os_vm = $request->os_vm;
        $dataVm->ip_public_vm = $request->ip_public_vm;
        $dataVm->ip_local_vm = $request->ip_local_vm;
        $dataVm->save();
        return to_route('data-vm.index')->with('success','Data Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serverData = serverData::all();
        $dataVm = dataVm::find($id); 
        return view('data-vm.edit',compact('dataVm','serverData'));
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
            'server_data_id' => 'required|exists:server_data,id',
            'nama_vm' => 'required|string|max:255',
            'os_vm' => 'required|string|max:255',
            'ip_public_vm' => 'required|ip|unique:data_vm,ip_public_vm,' .$id,
            'ip_local_vm' => 'required|ip|unique:data_vm,ip_local_vm,' .$id,
        ], [
            'ip_public_vm.unique' => 'IP Publik sudah digunakan. Silakan masukkan IP yang berbeda.',
            'ip_local_vm.unique' => 'IP Lokal sudah digunakan. Silakan masukkan IP yang berbeda.',
        ]);

        $dataVm = dataVm::find($id);
        $dataVm->server_data_id = $request->server_data_id;
        $dataVm->nama_vm = $request->nama_vm;
        $dataVm->os_vm = $request->os_vm;
        $dataVm->ip_public_vm = $request->ip_public_vm;
        $dataVm->ip_local_vm = $request->ip_local_vm;
        $dataVm->save();
        return to_route('data-vm.index')->with('success','Data Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $dataVm = dataVm::findOrFail($id);
    
            if ($dataVm) {
                $dataVm->delete();
                return response()->json(['success' => 'Data berhasil dihapus']);
            } else {
                return response()->json(['error' => 'Data tidak ditemukan'], 404);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            // Menangani error foreign key constraint
            return response()->json(['error' => 'Gagal menghapus data. Ada data terkait yang masih mengacu.'], 400);
        }
    }

}