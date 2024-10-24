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

               <a href="{{ route('data-vm.index') }}" class="btn btn-info float-end"><i class="align-middle" data-feather="arrow-left"></i></a>
                <h5 class="card-title mb-0">Form Input Data Vm</h5>
            </div>
            <hr>
            <div class="col-12 col-lg-8">
                <form action="{{ route('data-vm.update',$dataVm->id) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Nama Vm</label>
                        <input type="text" class="form-control" name="nama_vm" value="{{ $dataVm->nama_vm }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Nama OS</label>
                        <input type="text" class="form-control" name="os_vm" value="{{ $dataVm->os_vm }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Ip Public Vm</label>
                        <input type="text" class="form-control" name="ip_public_vm"  value="{{ $dataVm->ip_public_vm }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Ip Local Vm</label>
                        <input type="text" class="form-control" name="ip_local_vm" value="{{ $dataVm->ip_local_vm }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Server</label>
                        <select name="server_data_id" id="" class="form-select">
                        <option value="">--Pilih Server--</option>
                        @foreach ($serverData as $server)
                                <option value="{{ $server->id }}" {{ $server->id == $dataVm->server_data_id ? 'selected' : '' }}>{{ $server->merk_server}} -- {{ $server->ip_server }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">Edit Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   
</div>
@endsection