<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {

    }
    public function index()
    {

        $riwayatExperience = riwayat::where('tipe', 'experience')->get();
        return view('dashboard.experience.index')->with('posts', $riwayatExperience);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge(['tipe' => $request->input('tipe', 'experience')]);

        $validasi = $request->validate([
            'judul' => 'required',
            'info1' => 'required',
            'tgl_mulai' => 'required',
            'tgl_akhir' => 'required',
        ], [
            'judul.required' => 'Judul wajib diisi',

            'info1.required' => 'Nama Perusahaan Wajib Diisis',

            'tgl_mulai.required' => 'Tanggal Mulai wajib diisi',

            'tgl_akhir.required' => 'Tanggal Akhir wajib diisi',

        ]);

        riwayat::create($validasi);
        return redirect()->route('experience.index')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = riwayat::where('id', $id)->first();
        return view("dashboard.experience.edit")->with('data', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validasi = $request->validate([
            'judul' => 'required',
            'info1' => 'required',
            'tgl_mulai' => 'required',
            'tgl_akhir' => 'required',
            'isi' => 'required',
            'tipe' => 'required|in:experience',
        ], [
            'judul.required' => 'Judul wajib diisi',

            'info1.required' => 'Nama Perusahaan Wajib Diisis',

            'tgl_mulai.required' => 'Tanggal Mulai wajib diisi',

            'tgl_akhir.required' => 'Tanggal Akhir wajib diisi',

            'isi.required' => 'Isi wajib diisi',
            'tipe.in' => 'Nilai Tipe tidak valid.',

        ]);

        riwayat::where('id', $id)->update($validasi);

        return redirect()->route('experience.index')->with('success', 'Berhasil Update data');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        riwayat::where('id', $id)->delete();
        return redirect()->route('experience.index')->with('success', 'Data Berhasil dihapau');
    }
}
