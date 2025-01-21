<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class DaftarController extends Controller
{
    public function index()
    {
        $daftars = Daftar::orderBy('created_at', 'DESC')->paginate(50);
        return view('welcome', compact('daftars'));
    }

    public function create()
    {
        return view('daftars.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'buktitransfer' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nama.required' => 'Inputan nama gagal, mohon di cek kembali.',
            'alamat.required' => 'Inputan alamat gagal, mohon di cek kembali.',
            'buktitransfer.required' => 'Bukti transfer wajib diunggah.',
            'buktitransfer.image' => 'File bukti transfer harus berupa gambar.',
            'buktitransfer.mimes' => 'Bukti transfer hanya mendukung format jpeg, png, jpg.',
            'buktitransfer.max' => 'Ukuran file bukti transfer tidak boleh lebih dari 2MB.',
        ]);

        try {
            // Simpan data ke database
            $daftar = new Daftar();
            $daftar->nama = $validatedData['nama'];
            $daftar->alamat = $validatedData['alamat'];

            // Upload file jika ada
            if ($request->hasFile('buktitransfer')) {
                $file = $request->file('buktitransfer');

                // Simpan file sementara
                $path = $file->store('tmp', 'local');
                $daftar->buktitransfer = $path;
            }

            $daftar->save();

            return redirect()->route('daftars.create')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->route('daftars.create')->with('error', 'Data belum berhasil disimpan, mohon coba lagi.');
        }
    }
}
