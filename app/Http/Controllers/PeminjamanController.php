<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeminjamanRequest;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Denda;
use App\Models\DetailPinjam;
use App\Models\Peminjaman;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $peminjaman = Peminjaman::with(['anggota', 'denda', 'user', 'detailPinjam.buku'])
            ->withCount('detailPinjam')
            ->orderByDesc('tgl_pinjam')
            ->paginate();

        return view('peminjaman.index', compact('peminjaman'))
            ->with('i', ($request->input('page', 1) - 1) * $peminjaman->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $peminjaman = new Peminjaman();

        return view('peminjaman.create', array_merge(
            compact('peminjaman'),
            $this->formOptions(),
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PeminjamanRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['id_denda'] = $validated['id_denda'] ?? null;
        $bukuIds = $validated['buku_ids'];
        unset($validated['buku_ids']);

        DB::transaction(function () use ($validated, $bukuIds, $request) {
            $peminjaman = Peminjaman::create($validated + [
                'id' => $request->user()->id,
            ]);

            $this->syncDetailPinjam($peminjaman, $bukuIds);
        });

        return Redirect::route('peminjaman.index')
            ->with('success', 'Peminjaman created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman): View
    {
        $peminjaman->load(['anggota', 'denda', 'user', 'detailPinjam.buku']);

        return view('peminjaman.show', compact('peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman): View
    {
        $peminjaman->load('detailPinjam');

        return view('peminjaman.edit', array_merge(
            compact('peminjaman'),
            $this->formOptions(),
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PeminjamanRequest $request, Peminjaman $peminjaman): RedirectResponse
    {
        $validated = $request->validated();
        $validated['id_denda'] = $validated['id_denda'] ?? null;
        $bukuIds = $validated['buku_ids'];
        unset($validated['buku_ids']);

        DB::transaction(function () use ($peminjaman, $validated, $bukuIds, $request) {
            $peminjaman->update($validated + [
                'id' => $request->user()->id,
            ]);

            $this->syncDetailPinjam($peminjaman, $bukuIds);
        });

        return Redirect::route('peminjaman.index')
            ->with('success', 'Peminjaman updated successfully.');
    }

    public function destroy(Peminjaman $peminjaman): RedirectResponse
    {
        $peminjaman->delete();

        return Redirect::route('peminjaman.index')
            ->with('success', 'Peminjaman deleted successfully.');
    }

    /**
     * @return array<string, \Illuminate\Support\Collection>
     */
    private function formOptions(): array
    {
        return [
            'anggotaOptions' => Anggota::orderBy('nama')->get(['id_anggota', 'nama']),
            'dendaOptions' => Denda::orderBy('nominal')->get(['id_denda', 'nominal']),
            'bukuOptions'   => Buku::orderBy('judul')->get(['id_buku', 'judul']),
        ];
    }

    /**
     * @param  array<int, int>  $bukuIds
     */
    private function syncDetailPinjam(Peminjaman $peminjaman, array $bukuIds): void
    {
        $peminjaman->detailPinjam()->delete();

        $dueDate = Carbon::parse($peminjaman->tgl_pinjam)->addDays((int) $peminjaman->lama_pinjam)->toDateString();

        $payload = collect($bukuIds)
            ->filter()
            ->unique()
            ->map(fn ($idBuku) => [
                'id_pinjam' => $peminjaman->id_pinjam,
                'id_buku' => $idBuku,
                'tgl_kembali' => $dueDate,
            ])->values()->all();

        if (! empty($payload)) {
            DetailPinjam::insert($payload);
        }
    }
}
