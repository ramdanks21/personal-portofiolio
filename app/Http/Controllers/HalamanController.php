<?php

namespace App\Http\Controllers;

use App\Models\Halaman;
use Illuminate\Http\Request;

class HalamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.halaman.index', [
            'posts' => Halaman::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.halaman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ], [
            'judul.required' => 'Judul wajib diisi',
            'isi.required' => 'Isi wajib diisi',

        ]);

        Halaman::create($validasi);
        return redirect()->route('halaman.index')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Halaman::where('id', $id)->first();
        return view("dashboard.halaman.edit")->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ], [
            'judul.required' => 'Judul wajib diisi',
            'isi.required' => 'Isi wajib diisi',

        ]);

        Halaman::where('id', $id)->update($validasi);
        return redirect()->route('halaman.index')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Halaman::where('id', $id)->delete();

        // Redirect atau berikan respons sesuai kebutuhan
        return redirect()->route('halaman.index')->with('success', 'Data berhasil dihapus.');
    }
}
