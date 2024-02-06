<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $tipe;

    public function __construct()
    {
        $this->tipe = 'education';
    }
    public function index()
    {

        $query = riwayat::where('tipe', $this->tipe)->get();

        return view('dashboard.education.index')->with('posts', $query);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge(['tipe' => $request->input('tipe', 'education')]);

        $validasi = $request->validate([
            'judul' => 'required',
            'info1' => 'required',
            'info2' => 'required',
            'info3' => 'required',
            'tgl_mulai' => 'required',
            'tgl_akhir' => 'required',
            'tipe' => 'required|in:education',
        ], [
            'judul.required' => 'Nama Universitas wajib diisi',

            'info1.required' => 'Nama Fakultas Wajib Diisis',
            'info2.required' => 'Nama Prodi Wajib Diisis',
            'info3.required' => 'IPK Wajib Diisis',

            'tgl_mulai.required' => 'Tanggal Mulai wajib diisi',

            'tgl_akhir.required' => 'Tanggal Akhir wajib diisi',
            'tipe.in' => 'Nilai Tipe tidak valid.',
        ]);

        riwayat::create($validasi);
        return redirect()->route('education.index')->with('success', 'Berhasil menambahkan data');
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
        return view("dashboard.education.edit")->with('data', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'judul' => 'required',
            'info1' => 'required',
            'info2' => 'required',
            'info3' => 'required',
            'tgl_mulai' => 'required',
            'tgl_akhir' => 'required',
            'tipe' => 'Education',
        ], [
            'judul.required' => 'Nama Universitas wajib diisi',

            'info1.required' => 'Nama Fakultas Wajib Diisis',
            'info2.required' => 'Nama Prodi Wajib Diisis',
            'info3.required' => 'IPK Wajib Diisis',

            'tgl_mulai.required' => 'Tanggal Mulai wajib diisi',

            'tgl_akhir.required' => 'Tanggal Akhir wajib diisi',

        ]);

        riwayat::where('id', $id)->update($validasi);

        return redirect()->route('education.index')->with('success', 'Berhasil Update data');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        riwayat::where('id', $id)->delete();
        return redirect()->route('education.index')->with('success', 'Data Berhasil dihapau');
    }
}
