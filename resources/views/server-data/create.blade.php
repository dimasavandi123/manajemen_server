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
        <div class="alert alert-danger " role="alert">
            <h3 class="alert-heading ">Error</h3>
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

                <a href="{{ route('server-data.index') }}" class="btn btn-info float-end"><i class="align-middle" data-feather="arrow-left"></i></a>
                <h5 class="card-title mb-0">Form Input Data Server</h5>
            </div>
            <hr>
                    <form action="{{ route('server-data.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="" class="form-label">Merk Server</label>
                            <input type="text" name="merk_server" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="" class="form-label">IP Server </label>
                            <input type="text" name="ip_server" class="form-control">
                        </div>


                        <div class="form-group mb-3">
                            <label for="" class="form-label">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </div>

                </form>
        
            
        </div>
    </div>
   
</div>
@endsection