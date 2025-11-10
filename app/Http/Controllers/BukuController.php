<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BukuRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $bukus = Buku::paginate();

        return view('buku.index', compact('bukus'))
            ->with('i', ($request->input('page', 1) - 1) * $bukus->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $buku = new Buku();

        return view('buku.create', compact('buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BukuRequest $request): RedirectResponse
    {
        Buku::create($request->validated());

        return Redirect::route('buku.index')
            ->with('success', 'Buku created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $buku = Buku::find($id);

        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $buku = Buku::find($id);

        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BukuRequest $request, Buku $buku): RedirectResponse
    {
        $buku->update($request->validated());

        return Redirect::route('buku.index')
            ->with('success', 'Buku updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Buku::find($id)->delete();

        return Redirect::route('buku.index')
            ->with('success', 'Buku deleted successfully');
    }
}
