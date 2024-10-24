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
        @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            <h3 class="alert-heading">Error</h3>
            @foreach ($errors->all() as $error)
            <ul>
                <li>{{ $error }}</li>
            </ul>
            @endforeach
        </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-sm-6 col-md-3">
        <div class="card shadow-lg border" style="background-color: #f8f9fa; border-color: #dee2e6;">
            <div class="card-body">
                <h5 class="card-title">Data Server</h5>
                <h1 class="mt-1 mb-3">{{ $jumlahServer }}</h1>
                
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="card shadow-lg border" style="background-color: #f1f3f4; border-color: #dee2e6;">
            <div class="card-body">
                <h5 class="card-title">Data VM</h5>
                <h1 class="mt-1 mb-3">{{ $jumlahVm }}</h1>
             
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="card shadow-lg border" style="background-color: #f8f9fa; border-color: #dee2e6;">
            <div class="card-body">
                <h5 class="card-title">Data Aplikasi</h5>
                <h1 class="mt-1 mb-3">{{ $jumlahAplikasi }}</h1>
             
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="card shadow-lg border" style="background-color: #f1f3f4; border-color: #dee2e6;">
            <div class="card-body">
                <h5 class="card-title">Jumlah Keseluruhan Data</h5>
                <h1 class="mt-1 mb-3">{{ $jumlahData }}</h1>
              
            </div>
        </div>
    </div>
</div>
@endsection
