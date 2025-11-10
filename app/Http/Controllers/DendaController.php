<?php

namespace App\Http\Controllers;

use App\Http\Requests\DendaRequest;
use App\Models\Denda;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DendaController extends Controller
{
    public function index(Request $request): View
    {
        $dendas = Denda::orderByDesc('nominal')->paginate();

        return view('denda.index', compact('dendas'))
            ->with('i', ($request->input('page', 1) - 1) * $dendas->perPage());
    }

    public function create(): View
    {
        $denda = new Denda();

        return view('denda.create', compact('denda'));
    }

    public function store(DendaRequest $request): RedirectResponse
    {
        Denda::create($request->validated());

        return Redirect::route('denda.index')
            ->with('success', 'Denda created successfully.');
    }

    public function show(Denda $denda): View
    {
        return view('denda.show', compact('denda'));
    }

    public function edit(Denda $denda): View
    {
        return view('denda.edit', compact('denda'));
    }

    public function update(DendaRequest $request, Denda $denda): RedirectResponse
    {
        $denda->update($request->validated());

        return Redirect::route('denda.index')
            ->with('success', 'Denda updated successfully.');
    }

    public function destroy(Denda $denda): RedirectResponse
    {
        $denda->delete();

        return Redirect::route('denda.index')
            ->with('success', 'Denda deleted successfully.');
    }
}
