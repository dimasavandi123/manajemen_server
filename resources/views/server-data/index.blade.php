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
                
                <a href="{{ route('server-data.create') }}" class="btn btn-info float-end"><i class="align-middle" data-feather="plus"></i> </a>
                <h5 class="card-title mb-0">Data Vm</h5>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover table-striped my-0 mb-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Merk Server</th>
                            <th>IP Server</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($serverData as $no => $server)
                          <tr>
                            <input type="hidden" class="delete_id" value="{{ $server->id }}">
                            <th>{{ $no+1 }}</th>
                            <td>{{ $server->merk_server }}</td>
                            <td>{{ $server->ip_server }}</td> 
                            <td>{{ $server->keterangan }}</td>
                            <td>
                      
                                    <form action="{{ route('server-data.destroy',$server->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <div class="btn-group">
                                            <a href="{{ route('server-data.edit',$server->id) }}" class="btn btn-primary btn-sm"><i class="align-middle" data-feather="edit"></i></a>
                                            <button class="btn btn-danger btn-sm btndelete"><i class="align-middle" data-feather="trash-2"></i></button>
                                        </div>
                                    </form>
                            </td>
                          </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>

            {{ $serverData->links() }}
        </div>
    </div>
   
</div>



<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.btndelete').click(function (e) {
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
                        id: deleteid,
                    };
                    $.ajax({
                        type: "DELETE",
                        url: 'server-data/' + deleteid,
                        data: data,
                        success: function (response) {
                            // Tangani respon sukses, pastikan response.success ada
                            if (response.success) {
                                swal(response.success, {
                                    icon: "success",
                                })
                                .then((result) => {
                                    location.reload();
                                });
                            } else {
                                // Jika tidak ada pesan sukses, tampilkan kesalahan
                                swal("Terjadi kesalahan, data mungkin tidak dapat dihapus.", {
                                    icon: "error",
                                });
                            }
                        },
                        error: function (xhr) {
                            // Tangani error jika masih ada data terkait (status 400)
                            if (xhr.status === 400) {
                                // Tampilkan alert jika penghapusan gagal karena ada relasi
                                swal({
                                    title: "Gagal Menghapus Data",
                                    text: xhr.responseJSON.error,
                                    icon: "error",
                                    button: "OK",
                                });
                            } else {
                                swal("Terjadi kesalahan saat menghapus data,silahkan cek kembali data yang terkait", {
                                    icon: "error",
                                });
                            }
                            // Tambahkan log di console untuk debugging
                            console.log("Error response:", xhr);
                        }
                    });
                }
            });
        });
    });
</script>



@endsection