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
                <form action="{{ route('data-aplikasi.index') }}" method="GET" class="mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="data_vm_id" class="form-label">Filter Berdasarkan Data VM</label>
                            <select name="data_vm_id" class="form-select">
                                <option value="">-- Semua VM --</option>
                                @foreach ($dataVm as $vm)
                                    <option value="{{ $vm->id }}" {{ request('data_vm_id') == $vm->id ? 'selected' : '' }}>
                                        {{ $vm->nama_vm }} ({{ $vm->ip_local_vm }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">&nbsp;</label>
                            <button type="submit" class="btn btn-primary d-block">Filter</button>
                        </div>
                        <div class="col-md-4 d-flex align-items-end">
                            <a href="{{ route('data-aplikasi.index') }}" class="btn btn-secondary me-2"><i class="align-middle" data-feather="refresh-cw"></i></a>
                            <a href="{{ route('data-aplikasi.cetak-pdf', request()->all()) }}" class="btn btn-danger"><i class="align-middle" data-feather="printer"></i></a>
                        </div>
                    </div>
                    
                </form>


                <a href="{{ route('data-aplikasi.create') }}" class="btn btn-info float-end"><i class="align-middle" data-feather="plus"></i> </a>
                <h5 class="card-title mb-0">Data Aplikasi</h5>
            </div>

            
            
            <div class="table-responsive">
                <table class="table table-hover table-striped my-0 mb-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>IP Local</th>
                            <th>IP Public</th>
                            <th>Nama Aplikasi</th>
                            <th>Nama OPD</th>
                            <th>Keterangan PIC</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($dataAplikasi as $no => $aplikasi)
                          <tr>
                            <input type="hidden" class="delete_id" value="{{ $aplikasi->id }}">
                            <th>{{ $no+1 }}</th>
                            <td>{{ $aplikasi->dataVm->ip_local_vm }}</td>
                            <td>{{ $aplikasi->dataVm->ip_public_vm }}</td> 
                            <td>{{ $aplikasi->nama_aplikasi }}</td>
                            <td>{{ $aplikasi->nama_opd }}</td>
                            <td>{{ $aplikasi->keterangan_pic }}</td>
                            <td>{{ $aplikasi->status }}</td>
                            <td>
                      
                                    <form action="{{ route('data-aplikasi.destroy',$aplikasi->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <div class="btn-group">
                                            <a href="{{ route('data-aplikasi.edit',$aplikasi->id) }}" class="btn btn-primary btn-sm"><i class="align-middle" data-feather="edit"></i></a>

                                            <a href="{{ route('data-aplikasi.show',$aplikasi->id) }}" class="btn btn-success btn-sm"><i class="align-middle" data-feather="eye"></i></a>
                                            <button class="btn btn-danger btn-sm btndelete"><i class="align-middle" data-feather="trash-2"></i></button>
                                        </div>
                                    </form>
                            </td>
                          </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>

            {{ $dataAplikasi->links() }}
        </div>
    </div>
   
</div>



<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function (){
        $.ajaxSetup({
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

            $('.btndelete').click(function(e){
                e.preventDefault();

                var deleteid = $(this).closest("tr").find('.delete_id').val();
                swal({
                    title: "Apakah Yakin Ingin Menghapus Data ini?",
                    text: "Setelah dihapus data tidak akan bisa dipulihkan kembali",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        var data = {
                            "_token": $('meta[name="csrf-token"]').attr('content'),
                            id : deleteid,
                        };
                             $.ajax({
                                type : "DELETE",
                                url : 'data-aplikasi/' + deleteid,
                                data: data,
                                success: function(response){
                                    swal(response.success,{
                                    icon: "success",
                                })
                                    .then((result)=>{
                                        location.reload();
                                    });
                            }
                        });
                    }else{
                        swal(response.error,{
                            icon: "error",
                        });
                    }
                });

            });
    });
</script>
@endsection