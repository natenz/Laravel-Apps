<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Hash; // Pastikan Hash diimport

class AuthController extends Controller
{
    public function login(Request $request)
{
    // Validasi input
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    // Cek apakah kredensial valid
    $karyawan = Karyawan::where('username', $request->username)->first();

    if ($karyawan && Hash::check($request->password, $karyawan->password)) {
        // Jika berhasil login
        $token = $karyawan->createToken('YourAppName')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'token' => $token
        ]);
    } else {
        // Jika login gagal
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}

}
