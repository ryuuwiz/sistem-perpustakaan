<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Buku</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; color: #111827; }
        h1 { font-size: 20px; margin-bottom: 4px; }
        .meta { font-size: 10px; color: #4b5563; margin-bottom: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #cbd5f5; padding: 5px 6px; }
        th { background: #e0e7ff; text-transform: uppercase; font-size: 10px; text-align: left; }
        tbody tr:nth-child(even) { background: #f8fafc; }
    </style>
</head>
<body>
    <h1>Laporan Koleksi Buku</h1>
    <p class="meta">Dicetak pada {{ $generatedAt->format('d/m/Y H:i') }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Kategori</th>
                <th>Tahun</th>
                <th>ISBN</th>
                <th>Tgl Input</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buku as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->pengarang }}</td>
                <td>{{ $item->kategoriBuku->kategori ?? '-' }}</td>
                <td>{{ $item->tahun }}</td>
                <td>{{ $item->isbn }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tgl_input)->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
