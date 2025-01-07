<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MultiStepFormController extends Controller
{
    public function index()
    {
        return view('multi-step-form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|numeric|digits:16',
            'kk' => 'required|numeric|digits:16',
            'nama_kk' => 'required|string|max:255',
            'nisn' => 'nullable|numeric|digits:10',
            'nis' => 'nullable|numeric|digits_between:1,10',
            'tk' => 'nullable|string|max:255',
            'paud' => 'nullable|string|max:255',
            'hobi' => 'nullable|string|max:255',
            'cita_cita' => 'nullable|string|max:255'
        ], [
            [
                'nama.required' => 'Nama wajib diisi.',
                'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
                'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
                'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
                'nik.required' => 'NIK wajib diisi.',
                'nik.numeric' => 'NIK harus berupa angka.',
                'nik.digits' => 'NIK harus terdiri dari 16 digit.',
                'kk.required' => 'Nomor KK wajib diisi.',
                'kk.numeric' => 'Nomor KK harus berupa angka.',
                'kk.digits' => 'Nomor KK harus terdiri dari 16 digit.',
                'nama_kk.required' => 'Nama kepala keluarga wajib diisi.',
                'nisn.numeric' => 'NISN harus berupa angka.',
                'nisn.digits' => 'NISN harus terdiri dari 10 digit.',
                'nis.numeric' => 'NIS harus berupa angka.',
                'nis.digits_between' => 'NIS harus memiliki panjang antara 1 hingga 10 digit.',
                'hobi.max' => 'Hobi tidak boleh lebih dari 255 karakter.',
                'cita_cita.max' => 'Cita-cita tidak boleh lebih dari 255 karakter.',
        ]);

        Crudtest::create([
            $crudtest->nama = $request->nama;
            $crudtest->tempat_lahir = $request->tempat_lahir;
            $crudtest->tanggal_lahir = $request->tanggal_lahir;
            $crudtest->nik = $request->nik;
            $crudtest->kk = $request->kk;
            $crudtest->nama_kk = $request->nama_kk;
            $crudtest->nisn = $request->nisn;
            $crudtest->nis = $request->nis;
            $crudtest->tk = $request->tk;
            $crudtest->paud = $request->paud;
            $crudtest->hobi = $request->hobi;
            $crudtest->cita_cita = $request->cita_cita;
        ]);

        return redirect()->back()->with('success', 'User registered successfully!');
    }
}
