<?php

namespace App\Http\Controllers;

use App\Models\metada;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            '_foto' => 'mimes:jpeg,jpg,png,gif',
            '_email' => 'required|email',
        ], [
            '_foto.mimes' => 'Foto Harus Sesuai Jpeg,jpg',
            '_email.required' => 'Email Wajib Diisi',
            '_email.email' => 'Email Tidak Valid',
        ]);
        // proses inset foto juka ada fotonya
        if ($request->hasFile('_foto')) {
            $foto_file = $request->file('_foto');
            $foto_extensi = $foto_file->extension();
            $foto_baru = date('ymdhis') . ".$foto_extensi";
            $foto_file->move(public_path('foto'), $foto_baru);

            // kalo ada update foto
            $foto_lama = get_meta_value('_foto');
            File::delete(public_path('foto') . "/" . $foto_lama);

            metada::updateOrCreate(['meta_key' => '_foto'], ['meta_value' => $foto_baru]);
        }
        metada::updateOrCreate(['meta_key' => '_email'], ['meta_value' => $request->_email]);

        metada::updateOrCreate(['meta_key' => '_kota'], ['meta_value' => $request->_kota]);

        metada::updateOrCreate(['meta_key' => '_provinsi'], ['meta_value' => $request->_provinsi]);

        metada::updateOrCreate(['meta_key' => '_nohp'], ['meta_value' => $request->_nohp]);

        metada::updateOrCreate(['meta_key' => '_facebook'], ['meta_value' => $request->_facebook]);

        metada::updateOrCreate(['meta_key' => '_linkedin'], ['meta_value' => $request->_linkedin]);

        metada::updateOrCreate(['meta_key' => '_twitter'], ['meta_value' => $request->_twitter]);

        return redirect()->route('profile.index')->with('success', 'berhasil malakukan update data');
    }
}
