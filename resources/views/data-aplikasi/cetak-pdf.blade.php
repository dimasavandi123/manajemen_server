<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Aplikasi</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Data Aplikasi</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>IP Local</th>
                <th>IP Public</th>
                <th>Nama Aplikasi</th>
                <th>Nama OPD</th>
                <th>Keterangan PIC</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataAplikasi as $no => $aplikasi)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $aplikasi->dataVm->ip_local_vm }}</td>
                    <td>{{ $aplikasi->dataVm->ip_public_vm }}</td>
                    <td>{{ $aplikasi->nama_aplikasi }}</td>
                    <td>{{ $aplikasi->nama_opd }}</td>
                    <td>{{ $aplikasi->keterangan_pic }}</td>
                    <td>{{ $aplikasi->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
