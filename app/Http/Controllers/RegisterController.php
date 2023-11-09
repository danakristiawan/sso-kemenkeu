<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => ['required'],
            'nip' => ['required', 'unique:users,nip'],
            'password' => ['required', 'min:3'],
            // 'password_confirmation' => ['required', 'min:6', 'confirmed']
        ]);

       $user = User::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'password' => Hash::make($request->password),
        ]);

        if (Auth::attempt(['nip' => $user->nip, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect()->intended('beranda');
        }
    }
}
