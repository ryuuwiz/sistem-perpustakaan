<?php

namespace App\Http\Controllers;

use App\Models\KategoriBuku;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\KategoriBukuRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class KategoriBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $kategoriBukus = KategoriBuku::paginate();

        return view('kategori-buku.index', compact('kategoriBukus'))
            ->with('i', ($request->input('page', 1) - 1) * $kategoriBukus->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $kategoriBuku = new KategoriBuku();

        return view('kategori-buku.create', compact('kategoriBuku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KategoriBukuRequest $request): RedirectResponse
    {
        KategoriBuku::create($request->validated());

        return Redirect::route('kategori-buku.index')
            ->with('success', 'KategoriBuku created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $kategoriBuku = KategoriBuku::find($id);

        return view('kategori-buku.show', compact('kategoriBuku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $kategoriBuku = KategoriBuku::find($id);

        return view('kategori-buku.edit', compact('kategoriBuku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KategoriBukuRequest $request, KategoriBuku $kategoriBuku): RedirectResponse
    {
        $kategoriBuku->update($request->validated());

        return Redirect::route('kategori-buku.index')
            ->with('success', 'KategoriBuku updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        KategoriBuku::find($id)->delete();

        return Redirect::route('kategori-buku.index')
            ->with('success', 'KategoriBuku deleted successfully');
    }
}
