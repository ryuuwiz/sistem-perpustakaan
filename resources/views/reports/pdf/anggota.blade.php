<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Anggota</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #111827;
        }

        h1 {
            font-size: 20px;
            margin-bottom: 4px;
        }

        .meta {
            font-size: 11px;
            color: #4b5563;
            margin-bottom: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #cbd5f5;
            padding: 6px 8px;
        }

        th {
            background: #e0e7ff;
            text-transform: uppercase;
            font-size: 11px;
            text-align: left;
        }

        tbody tr:nth-child(even) {
            background: #f8fafc;
        }
    </style>
</head>

<body>
    <h1>Laporan Anggota</h1>
    <p class="meta">Dicetak pada {{ $generatedAt->format('d/m/Y H:i') }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Tgl Lahir</th>
                <th>Tgl Daftar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggota as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->no_hp }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tgl_lahir)->format('d/m/Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tgl_daftar)->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>