<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>PDF DATA SERVER</title>
</head>
<body onclick="window.print()">
    <table class="table my-0 mb-3">
        <thead>
            <tr>
                <th>No</th>
                <th>IP Public Server</th>
                <th>IP Local Server</th>
                <th>Nama Aplikasi</th>
                <th>Nama OPD</th>
                <th>WSS Server</th>
                <th>Pass Server</th>
                <th>Port Server</th>
                <th>Status</th>
                <th>Nama Vm</th>
                <th>IP Public Vm</th>
                <th>IP Local Vm</th>
             
            </tr>
        </thead>
        <tbody>
            @foreach ($dataServer as $no => $server)
                <tr>
                    <input type="hidden" class="delete_id" value="{{ $server->id }}">
                    <td>{{ $no + 1 }}</td> 
                    <td>{{ $server->ip_public_server }}</td> 
                    <td>{{ $server->ip_local_server }}</td>
                    <td>{{ $server->nama_aplikasi }}</td> 
                    <td>{{ $server->nama_opd }}</td>
                    <td>{{ $server->wss_server }}</td> 
                    <td>{{ $server->pass_server }}</td>
                    <td>{{ $server->port_server }}</td> 
                    <td>{{ $server->status }}</td> 
                    
                    <td>{{ $server->dataVm->nama_vm }}</td> 
                    <td>{{ $server->dataVm->ip_public_vm }}</td> 
                    <td>{{ $server->dataVm->ip_local_vm }}</td> 
                  
                </tr>
            @endforeach
        </tbody>

        <script>
            
            window.onload = function() {
                window.print();
            }
        </script>
</body>
</html>