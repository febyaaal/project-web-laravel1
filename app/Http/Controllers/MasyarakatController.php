<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class MasyarakatController extends Controller
{
    public function index()
    {
        $masyarakat = Masyarakat::all();
        return view('masyarakat', compact('masyarakat'));
    }

    public function create()
    {
        $genders = ['Laki-laki', 'Perempuan'];
        return view('masyarakat_create', compact('genders'));
    }

    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'nomor_kk' => 'required|numeric|digits:16', 
        'nomor_ktp' => 'required|numeric|digits:16|unique:masyarakats,nomor_ktp',
        'nama' => 'required|string|max:255',
        'alamat' => 'required',
        'jenis_kelamin' => 'required',
    ]);

    
    $masyarakat = new Masyarakat;

    
    $masyarakat->nomor_kk = $request->nomor_kk;
    $masyarakat->nomor_ktp = $request->nomor_ktp;
    $masyarakat->nama = $request->nama;
    $masyarakat->alamat = $request->alamat;
    $masyarakat->jenis_kelamin = $request->jenis_kelamin;

    
    $masyarakat->save();

    return redirect()->route('masyarakat.index');
}

public function edit($id)
{
    $masyarakat = Masyarakat::findOrFail($id); 
    $genders = ['Laki-laki', 'Perempuan'];
    return view('masyarakat_edit', compact('masyarakat', 'genders'));
}


public function update(Request $request, $id)
{
    $request->validate([
        'nomor_kk' => 'required|numeric|digits:16',
        'nomor_ktp' => 'required|numeric|digits:16',
        'nama' => 'required',
        'alamat' => 'required',
        'jenis_kelamin' => 'required',
    ]);

    $masyarakat = Masyarakat::findOrFail($id);
    $masyarakat->update($request->all()); 
    return redirect()->route('masyarakat.index');
}


public function destroy($id)
{
    $masyarakat = Masyarakat::findOrFail($id);
    $masyarakat->delete();

    return redirect()->route('masyarakat.index');
}


}

