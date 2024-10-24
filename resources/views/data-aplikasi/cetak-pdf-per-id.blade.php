<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Aplikasi PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Detail Data Aplikasi</h2>

    <table>
        <tr>
            <th>IP Local</th>
            <td>{{ $dataAplikasi->dataVm->ip_local_vm }}</td>
        </tr>
        <tr>
            <th>IP Public</th>
            <td>{{ $dataAplikasi->dataVm->ip_public_vm }}</td>
        </tr>
        <tr>
            <th>Nama VM
            <td>{{ $dataAplikasi->dataVm->nama_vm }}</td>
        </tr>
        <tr>
            <th>Nama VM
            <td>{{ $dataAplikasi->dataVm->os_vm }}</td>
        </tr>
        <tr>
            <th>Nama Aplikasi</th>
            <td>{{ $dataAplikasi->nama_aplikasi }}</td>
        </tr>
        <tr>
            <th>Nama OPD</th>
            <td>{{ $dataAplikasi->nama_opd }}</td>
        </tr>
        <tr>
            <th>Keterangan PIC</th>
            <td>{{ $dataAplikasi->keterangan_pic }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $dataAplikasi->status }}</td>
        </tr>
        <tr>
            <th>URL Aplikasi</th>
            <td>{{ $dataAplikasi->url_aplikasi }}</td>
        </tr>
        <tr>
            <th>Pass Aplikasi</th>
            <td>{{ $dataAplikasi->pass_aplikasi }}</td>
        </tr>
        <tr>
            <th>Versi PHP</th>
            <td>{{ $dataAplikasi->versi_php }}</td>
        </tr>
        <tr>
            <th>Port Aplikasi</th>
            <td>{{ $dataAplikasi->port_aplikasi }}</td>
        </tr>
    </table>
</body>
</html>
