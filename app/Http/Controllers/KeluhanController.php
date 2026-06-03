<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keluhan;
use App\Models\Masyarakat;

class KeluhanController extends Controller
{
    public function index()
    {
        $keluhans = Keluhan::with('pelapor')->get();
        return view('keluhan', compact('keluhans'));
    }

    public function create()
    {
        $masyarakats = Masyarakat::all();
        return view('keluhan_create', compact('masyarakats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'masyarakat_id' => 'required|exists:masyarakats,id',
            'keluhan'       => 'required|string',
            'status'        => 'required|in:sent,reviewed,on progress,rejected,approved',
        ]);

        Keluhan::create($request->all());

        return redirect()->route('keluhan.index')->with('success', 'Keluhan berhasil ditambahkan!');
    }

    public function show(int $id)
    {
        $keluhan = Keluhan::with('pelapor')->findOrFail($id);
        return view('keluhan_show', compact('keluhan'));
    }

    public function edit(int $id)
    {
        $keluhan     = Keluhan::findOrFail($id);
        $masyarakats = Masyarakat::all();
        return view('keluhan_edit', compact('keluhan', 'masyarakats'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'masyarakat_id' => 'required|exists:masyarakats,id',
            'keluhan'       => 'required|string',
            'status'        => 'required|in:sent,reviewed,on progress,rejected,approved',
        ]);

        $keluhan = Keluhan::findOrFail($id);
        $keluhan->update($request->all());

        return redirect()->route('keluhan.index')->with('success', 'Keluhan berhasil diupdate!');
    }

    public function destroy(int $id)
    {
        $keluhan = Keluhan::findOrFail($id);
        $keluhan->delete();

        return redirect()->route('keluhan.index')->with('success', 'Keluhan berhasil dihapus!');
    }
}