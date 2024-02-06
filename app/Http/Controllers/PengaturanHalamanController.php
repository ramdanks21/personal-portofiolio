<?php

namespace App\Http\Controllers;

use App\Models\Halaman;
use App\Models\metada;
use Illuminate\Http\Request;

class PengaturanHalamanController extends Controller
{
    public function index()
    {
        $datahalaman = Halaman::orderBy('judul', 'asc')->get();
        return view('dashboard.pengaturan-halaman.index')->with('datahalaman', $datahalaman);
    }

    public function update(Request $request)
    {
        metada::updateOrCreate(['meta_key' => '_about'], ['meta_value' => $request->_about], );

        metada::updateOrCreate(['meta_key' => '_intereset'], ['meta_value' => $request->_intereset], );

        metada::updateOrCreate(['meta_key' => '_award'], ['meta_value' => $request->_award],
        );
        return redirect()->route('pengaturanhalaman.index')->with('success', 'Berhasil Update data pengaturan halaman');
    }
}
