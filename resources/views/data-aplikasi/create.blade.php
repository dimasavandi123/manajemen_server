@extends('admin.index')
@section('content')

<div class="card">
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success d-flex justify-content-center align-items-center" role="alert">
            <span>{{ session('success') }}</span>
        </div>
        @endif
        @if (session('danger'))
        <div class="alert alert-danger d-flex justify-content-center align-items-center" role="alert">
            <span>{{ session('danger') }}</span>
        </div>
        @endif
        @if (count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <h3 class="alert-heading">Error</h3>
            @foreach ($errors->all() as $error)
                <ul>
                    <li>{{ $error }}</li>
                </ul>
            @endforeach
        </div>
        @endif

        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-9 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <a href="{{ route('data-aplikasi.index') }}" class="btn btn-info float-end">
                            <i class="align-middle" data-feather="arrow-left"></i>
                        </a>
                        <h5 class="card-title mb-0">Form Input Data Aplikasi</h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <form action="{{ route('data-aplikasi.store') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Data VM</label>
                                    <select name="data_vm_id" id="" class="form-select">
                                        <option value="">--Pilih--</option>
                                        @foreach ($dataVm as $Vm)
                                            <option value="{{ $Vm->id }}">{{ $Vm->nama_vm }}|{{ $Vm->ip_local_vm }}|{{ $Vm->ip_public_vm }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Nama Aplikasi</label>
                                    <input type="text" class="form-control" name="nama_aplikasi" value="{{ old('nama_aplikasi') }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Nama OPD</label>
                                    <input type="text" class="form-control" name="nama_opd" value="{{ old('nama_opd') }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">URL Aplikasi</label>
                                    <input type="text" class="form-control" name="url_aplikasi" value="{{ old('url_aplikasi') }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Password Aplikasi</label>
                                    <input type="text" class="form-control" name="pass_aplikasi" value="{{ old('pass_aplikasi') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Versi PHP</label>
                                    <input type="text" class="form-control" name="versi_php" value="{{ old('versi_php') }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Keterangan PIC</label>
                                    <input type="text" class="form-control" name="keterangan_pic" value="{{ old('keterangan_pic') }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Port Aplikasi</label>
                                    <input type="number" class="form-control" name="port_aplikasi" value="{{ old('port_aplikasi') }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="">--Pilih Status--</option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Nonaktif">Nonaktif</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
