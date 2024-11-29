<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    public function tambahKaryawan(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|unique:karyawan',
            'password' => 'required|min:6',
        ]);

        // Tambahkan data ke tabel karyawan
        $karyawan = Karyawan::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'Karyawan berhasil ditambahkan', 'data' => $karyawan]);
    }
}
