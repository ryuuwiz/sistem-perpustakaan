<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi Peminjaman</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; color: #111827; }
        h1 { font-size: 20px; margin-bottom: 4px; }
        .meta { font-size: 10px; color: #4b5563; margin-bottom: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #cbd5f5; padding: 5px 6px; vertical-align: top; }
        th { background: #e0e7ff; text-transform: uppercase; font-size: 10px; text-align: left; }
        ul { margin: 0; padding-left: 16px; }
    </style>
</head>
<body>
    <h1>Laporan Transaksi Peminjaman</h1>
    <p class="meta">Dicetak pada {{ $generatedAt->format('d/m/Y H:i') }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tgl Pinjam</th>
                <th>Anggota</th>
                <th>Petugas</th>
                <th>Daftar Buku</th>
                <th>Denda</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjaman as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    {{ \Carbon\Carbon::parse($item->tgl_pinjam)->format('d/m/Y') }}<br>
                    <small>Durasi: {{ $item->lama_pinjam }} hari</small>
                </td>
                <td>{{ $item->anggota->nama ?? '-' }}</td>
                <td>{{ $item->user->name ?? '-' }}</td>
                <td>
                    <ul>
                        @forelse ($item->detailPinjam as $detail)
                        <li>
                            {{ $detail->buku->judul ?? '-' }}
                            <small>(kembali: {{ $detail->tgl_kembali ? \Carbon\Carbon::parse($detail->tgl_kembali)->format('d/m/Y') : '-' }})</small>
                        </li>
                        @empty
                        <li>-</li>
                        @endforelse
                    </ul>
                </td>
                <td>Rp {{ number_format($item->denda->nominal ?? 0, 2, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
