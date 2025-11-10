<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AnggotaRequest;
use App\Models\Anggota;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $anggota = Anggota::paginate();

        return view('anggota.index', compact('anggota'))
            ->with('i', ($request->input('page', 1) - 1) * $anggota->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $anggota = new Anggota();

        return view('anggota.create', compact('anggota'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnggotaRequest $request): RedirectResponse
    {
        Anggota::create($request->validated());

        return Redirect::route('anggota.index')
            ->with('success', 'Anggota created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $anggota = Anggota::find($id);

        return view('anggota.show', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $anggota = Anggota::find($id);

        return view('anggota.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnggotaRequest $request, Anggota $anggota): RedirectResponse
    {
        $anggota->update($request->validated());

        return Redirect::route('anggota.index')
            ->with('success', 'Anggota updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Anggota::find($id)->delete();

        return Redirect::route('anggota.index')
            ->with('success', 'Anggota deleted successfully');
    }
}
