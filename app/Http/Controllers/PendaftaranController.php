<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PendaftaranController extends Controller
{
    // This method will show Pendaftarans page
    public function index()
    {
        $pendaftarans = Pendaftaran::orderBy('created_at', 'DESC')->paginate(50);
        return view('welcome', compact('pendaftarans'));
    }

    // This method will show create Pendaftaran page
    public function create()
    {
        return view('pendaftarans.create');
    }

    // This method will store a Pendaftaran in db
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nisn' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'jenjangpendidikan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'sekolahasal' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'nama_wali' => 'required|string|max:255',
            'nohp' => 'required|string|max:20', // Atur max sesuai kebutuhan
            'buktitransfer' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',

        ], [
            'nisn.required' => 'NISN wajib diisi.',
            'nama.required' => 'Nama wajib diisi.',
            'jenjangpendidikan.required' => 'Jenjang pendidikan wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'sekolahasal.required' => 'Sekolah asal wajib diisi.',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa format tanggal yang valid.',
            'nama_ayah.required' => 'Nama ayah wajib diisi.',
            'nama_ibu.required' => 'Nama ibu wajib diisi.',
            'nama_wali.required' => 'Nama wali wajib diisi.',
            'nohp.required' => 'Nomor HP wajib diisi.',
            'buktitransfer.required' => 'Bukti transfer wajib diunggah.',
            'buktitransfer.image' => 'Bukti transfer harus berupa gambar.',
            'buktitransfer.mimes' => 'Bukti transfer hanya boleh berupa file dengan format: jpeg, png, jpg, gif, atau svg.',
            'buktitransfer.max' => 'Ukuran bukti transfer tidak boleh lebih dari 1 MB.',
    ]);



        if ($validator->fails()) {
            return redirect()
            ->route('pendaftarans.create')
            ->withInput()
            ->withErrors($validator)
            ->with('error_message', 'Pendaftaran belum berhasil, Silakan periksa kembali data yang dimasukkan.');
        }

        // here we will insert Pendaftaran in db
        $Pendaftaran = new Pendaftaran();
        $Pendaftaran->nama = $request->nama;
        $Pendaftaran->nisn = $request->nisn;
        $Pendaftaran->nama = $request->nama;
        $Pendaftaran->jenjangpendidikan = $request->jenjangpendidikan;
        $Pendaftaran->alamat = $request->alamat;
        $Pendaftaran->sekolahasal = $request->sekolahasal;
        $Pendaftaran->tempat_lahir = $request->tempat_lahir;
        $Pendaftaran->tanggal_lahir = $request->tanggal_lahir;
        $Pendaftaran->nama_ayah = $request->nama_ayah;
        $Pendaftaran->nama_ibu = $request->nama_ibu;
        $Pendaftaran->nama_wali = $request->nama_wali;
        $Pendaftaran->nohp = $request->nohp;
        $Pendaftaran->buktitransfer = $request->buktitransfer;
        $Pendaftaran->save();

        $nama = $Pendaftaran->nama;

        if ($request->buktitransfer != "") {
            // here we will store buktitransfer
            $buktitransfer = $request->buktitransfer;
            $ext = $buktitransfer->getClientOriginalExtension();
            $buktitransferName = uniqid() . '_' . time() . '.' . $ext; // Unique buktitransfer name

            // Save buktitransfer to Pendaftarans directory
            $buktitransfer->move(public_path('storage/'), $buktitransferName);

            // Save buktitransfer name in database
            $Pendaftaran->buktitransfer = $buktitransferName;
            $Pendaftaran->save();
        }



        return redirect()->route('pendaftarans.index')
                ->with('success', 'Pendaftaran Berhasil')
                ->with('nama', $Pendaftaran->nama);
    }

    // This method will show edit Pendaftaran page
    public function edit($id)
    {

    }

    // This method will update a Pendaftaran
    public function update($id, Request $request)
    {


    }

    // This method will delete a Pendaftaran
    public function destroy($id)
    {

    }
}
