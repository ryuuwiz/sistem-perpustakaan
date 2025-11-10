<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function index(): View
    {
        return view('reports.index');
    }

    public function anggota()
    {
        $anggota = Anggota::orderBy('nama')->get();
        $pdf = Pdf::loadView('reports.pdf.anggota', [
            'anggota' => $anggota,
            'generatedAt' => now(),
        ])->setPaper('a4', 'portrait');

        return $pdf->stream('laporan-anggota-' . now()->format('Ymd_His') . '.pdf');
    }

    public function buku()
    {
        $buku = Buku::with('kategoriBuku')->orderBy('judul')->get();
        $pdf = Pdf::loadView('reports.pdf.buku', [
            'buku' => $buku,
            'generatedAt' => now(),
        ])->setPaper('a4', 'landscape');

        return $pdf->stream('laporan-buku-' . now()->format('Ymd_His') . '.pdf');
    }

    public function peminjaman()
    {
        $peminjaman = Peminjaman::with(['anggota', 'user', 'denda', 'detailPinjam.buku'])
            ->orderByDesc('tgl_pinjam')
            ->get();

        $pdf = Pdf::loadView('reports.pdf.peminjaman', [
            'peminjaman' => $peminjaman,
            'generatedAt' => now(),
        ])->setPaper('a4', 'landscape');

        return $pdf->stream('laporan-peminjaman-' . now()->format('Ymd_His') . '.pdf');
    }
}
