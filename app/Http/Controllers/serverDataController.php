<?php

namespace App\Http\Controllers;

use App\Models\serverData;
use Illuminate\Http\Request;

class serverDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serverData = serverData::paginate(10);
        return view('server-data.index',compact('serverData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serverData = serverData::all();
        return view('server-data.create',compact('serverData'));
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
            'merk_server' => 'required',
            'ip_server' => 'required|ip|unique:server_data,ip_server', 
            'keterangan' => 'required',
        ], [
            'ip_server.unique' => 'IP Server sudah digunakan.',
        ]);

        $serverData = new serverData;
        $serverData->merk_server = $request->merk_server;
        $serverData->ip_server = $request->ip_server;

        $serverData->keterangan = $request->keterangan;
        $serverData->save();

        return to_route('server-data.index')->with('success','Data Berhasil Di Tambah');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serverData = serverData::find($id);
        return view('server-data.edit',compact('serverData'));
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
            'merk_server' => 'required',
            'ip_server' => 'required|ip|unique:server_data,ip_server,' .$id, 
            'keterangan' => 'required',
        ], [
            'ip_server.unique' => 'IP Server sudah digunakan.',
        
        ]);

        $serverData = serverData::find($id);
        $serverData->merk_server = $request->merk_server;
        $serverData->ip_server = $request->ip_server;

        $serverData->keterangan = $request->keterangan;
        $serverData->save();

        return to_route('server-data.index')->with('success','Data Berhasil Di Update');
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
            $serverData = ServerData::findOrFail($id);
    
            if ($serverData) {
                $serverData->delete();
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
