<?php

namespace App\Http\Controllers;

use App\Models\DetailPinjam;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DetailPinjamRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DetailPinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $detailPinjams = DetailPinjam::paginate();

        return view('detail-pinjam.index', compact('detailPinjams'))
            ->with('i', ($request->input('page', 1) - 1) * $detailPinjams->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $detailPinjam = new DetailPinjam();

        return view('detail-pinjam.create', compact('detailPinjam'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DetailPinjamRequest $request): RedirectResponse
    {
        DetailPinjam::create($request->validated());

        return Redirect::route('detail-pinjams.index')
            ->with('success', 'DetailPinjam created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $detailPinjam = DetailPinjam::find($id);

        return view('detail-pinjam.show', compact('detailPinjam'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $detailPinjam = DetailPinjam::find($id);

        return view('detail-pinjam.edit', compact('detailPinjam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DetailPinjamRequest $request, DetailPinjam $detailPinjam): RedirectResponse
    {
        $detailPinjam->update($request->validated());

        return Redirect::route('detail-pinjams.index')
            ->with('success', 'DetailPinjam updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        DetailPinjam::find($id)->delete();

        return Redirect::route('detail-pinjams.index')
            ->with('success', 'DetailPinjam deleted successfully');
    }
}
