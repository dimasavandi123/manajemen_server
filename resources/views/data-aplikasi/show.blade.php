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

        <h5 class="card-title">Detail Aplikasi</h5>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label"><strong>IP Local:</strong></label>
                <p>{{ $dataAplikasi->dataVm->ip_local_vm }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label"><strong>IP Public:</strong></label>
                <p>{{ $dataAplikasi->dataVm->ip_public_vm }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label"><strong>Nama Vm:</strong></label>
                <p>{{ $dataAplikasi->dataVm->nama_vm }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label"><strong>OS VM:</strong></label>
                <p>{{ $dataAplikasi->dataVm->os_vm }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label"><strong>Nama Aplikasi:</strong></label>
                <p>{{ $dataAplikasi->nama_aplikasi }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label"><strong>Nama OPD:</strong></label>
                <p>{{ $dataAplikasi->nama_opd }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label"><strong>Keterangan PIC:</strong></label>
                <p>{{ $dataAplikasi->keterangan_pic }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label"><strong>Status:</strong></label>
                <p>{{ $dataAplikasi->status }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label"><strong>URL Aplikasi:</strong></label>
                <p>{{ $dataAplikasi->url_aplikasi }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label"><strong>Pass Aplikasi:</strong></label>
                <p>{{ $dataAplikasi->pass_aplikasi }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label"><strong>Versi PHP:</strong></label>
                <p>{{ $dataAplikasi->versi_php }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label"><strong>Port Aplikasi:</strong></label>
                <p>{{ $dataAplikasi->port_aplikasi }}</p>
            </div>
        </div>


        <div class="d-flex justify-content-between">
            <a href="{{ route('data-aplikasi.cetak-pdf', $dataAplikasi->id) }}" class="btn btn-danger">Download PDF</a>
            <a href="{{ route('data-aplikasi.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>

@endsection
