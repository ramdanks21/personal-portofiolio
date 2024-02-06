<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('google')->user();
        $id = $user->id;
        $name = $user->name;
        $email = $user->email;
        $avatar = $user->avatar;
        // $user->token

        $cek = User::where('email', $email)->count();
        if ($cek > 0) {
            // menggabungkan file gambar
            $avatar_file = $id . ".jpg";
            // meemasukan gambar
            $file_content = file_get_contents($avatar);
            // meyimpan data gambar file
            File::put(public_path("admin/images/faces/$avatar_file"), $file_content);

            $user = User::updateOrCreate([
                'email' => $email,
            ], [
                'name' => $name,
                'google_id' => $id,
                'avatar' => $avatar_file,
            ]);

            Auth::login($user);
            return redirect()->to('dashboard');
        } else {
            return redirect()->to('auth')->with('error', 'akun yang anda masukan tidak diizinkan untuk menggunakan halaman admin');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->to('auth');
    }
}
