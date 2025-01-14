<?php

namespace App\Http\Controllers;

use App\Models\Mtsputri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class MtsputriController extends Controller
{
    // This method will show santris page
    public function index()
    {
        $mtsputris = Mtsputri::orderBy('created_at', 'DESC')->paginate(10);

        return view('mtsputris.listsantri', [
            'mtsputris' => $mtsputris
        ]);
    }

    // This method will show create santri page
    public function create()
    {
        return view('mtsputris.create');
    }

    // This method will store a santri in db
    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
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
            'cita_cita' => 'nullable|string|max:255',
            'anak_ke' => 'nullable|integer|min:1',
            'jumlah_saudara' => 'nullable|integer|min:1',
            'kks' => 'nullable|string|max:255',
            'pkh' => 'nullable|string|max:255',
            'kip' => 'nullable|string|max:255',
            'jenjang_pendidikan_sebelumnya' => 'required|string|max:255',
            'status_sekolah_sebelumnya' => 'required|string|max:255',
            'nama_sekolah_sebelumnya' => 'required|string|max:255',
            'npsn_sekolah_sebelumnya' => 'required|string|max:255',
            'alamat_sekolah_sebelumnya' => 'required|string|max:255',
            'kecamatan_sekolah_sebelumnya' => 'required|string|max:255',
            'kabupaten_sekolah_sebelumnya' => 'required|string|max:255',
            'provinsi_sekolah_sebelumnya' => 'required|string|max:255',
            'nik_ayah' => 'required|string|max:255',
            'nama_ayah' => 'required|string|max:255',
            'tempat_lahir_ayah' => 'required|string|max:255',
            'tanggal_lahir_ayah' => 'required|date',
            'status_ayah' => 'required|string|max:255',
            'no_hp_ayah' => 'nullable|string|max:20',
            'pendidikan_ayah' => 'nullable|string|max:255',
            'pekerjaan_ayah' => 'nullable|string|max:255',
            'penghasilan_ayah' => 'nullable|string|max:255',
            'nik_ibu' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'tempat_lahir_ibu' => 'required|string|max:255',
            'tanggal_lahir_ibu' => 'required|date',
            'status_ibu' => 'required|string|max:255',
            'no_hp_ibu' => 'nullable|string|max:20',
            'pendidikan_ibu' => 'nullable|string|max:255',
            'pekerjaan_ibu' => 'nullable|string|max:255',
            'penghasilan_ibu' => 'nullable|string|max:255',
            'status_milik' => 'nullable|string|max:255',
            'alamat_rumah_tinggal' => 'nullable|string|max:255',
            'rt' => 'nullable|string|max:255',
            'rw' => 'nullable|string|max:255',
            'desa' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kode_pos' => 'nullable|string|max:255',


        ], [
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
            'jenjang_pendidikan_sebelumnya.required' => 'Jenjang pendidikan sebelumnya wajib diisi.',
            'status_sekolah_sebelumnya.required' => 'Status sekolah sebelumnya wajib diisi.',
            'nama_sekolah_sebelumnya.required' => 'Nama sekolah sebelumnya wajib diisi.',
            'npsn_sekolah_sebelumnya.required' => 'NPSN sekolah sebelumnya wajib diisi.',
            'alamat_sekolah_sebelumnya.required' => 'Alamat sekolah sebelumnya wajib diisi.',
            'kecamatan_sekolah_sebelumnya.required' => 'Kecamatan sekolah sebelumnya wajib diisi.',
            'kabupaten_sekolah_sebelumnya.required' => 'Kabupaten sekolah sebelumnya wajib diisi.',
            'provinsi_sekolah_sebelumnya.required' => 'Provinsi sekolah sebelumnya wajib diisi.',
            'nik_ayah.required' => 'NIK Ayah wajib diisi.',
            'nama_ayah.required' => 'Nama Ayah wajib diisi.',
            'tempat_lahir_ayah.required' => 'Tempat Lahir Ayah wajib diisi.',
            'tanggal_lahir_ayah.required' => 'Tanggal Lahir Ayah wajib diisi.',
            'tanggal_lahir_ayah.date' => 'Tanggal Lahir Ayah harus berupa tanggal yang valid.',
            'status_ayah.required' => 'Status Ayah wajib diisi.',
            'no_hp_ayah.required' => 'Nomor HP Ayah wajib diisi.',
            'pendidikan_ayah.required' => 'Pendidikan Ayah wajib diisi.',
            'pekerjaan_ayah.required' => 'Pekerjaan Ayah wajib diisi.',
            'penghasilan_ayah.required' => 'Penghasilan Ayah wajib diisi.',
            'nik_ibu.required' => 'NIK Ibu wajib diisi.',
            'nama_ibu.required' => 'Nama Ibu wajib diisi.',
            'tempat_lahir_ibu.required' => 'Tempat Lahir Ibu wajib diisi.',
            'tanggal_lahir_ibu.required' => 'Tanggal Lahir Ibu wajib diisi.',
            'tanggal_lahir_ibu.date' => 'Tanggal Lahir Ibu harus berupa tanggal yang valid.',
            'status_ibu.required' => 'Status Ibu wajib diisi.',
            'no_hp_ibu.required' => 'Nomor HP Ibu wajib diisi.',
            'pendidikan_ibu.required' => 'Pendidikan Ibu wajib diisi.',
            'pekerjaan_ibu.required' => 'Pekerjaan Ibu wajib diisi.',
            'penghasilan_ibu.required' => 'Penghasilan Ibu wajib diisi.',
            'status_milik.required' => 'Status milik wajib diisi.',
            'desa.required' => 'Desa wajib diisi.',
            'kecamatan.required' => 'Kecamatan wajib diisi.',
            'kabupaten.required' => 'Kabupaten wajib diisi.',
            'provinsi.required' => 'Provinsi wajib diisi.',

        ]);

        if ($validator->fails()) {
            return redirect()
            ->route('mtsputris.create')
            ->withInput()
            ->withErrors($validator)
            ->with('error_message', 'Silakan periksa kembali data yang dimasukkan.');
        }

        // here we will insert santri in db
        $mtsputri = new Mtsputri();
        $mtsputri->nama = $request->nama;
        $mtsputri->tempat_lahir = $request->tempat_lahir;
        $mtsputri->tanggal_lahir = $request->tanggal_lahir;
        $mtsputri->nik = $request->nik;
        $mtsputri->kk = $request->kk;
        $mtsputri->nama_kk = $request->nama_kk;
        $mtsputri->nisn = $request->nisn;
        $mtsputri->nis = $request->nis;
        $mtsputri->tk = $request->tk;
        $mtsputri->paud = $request->paud;
        $mtsputri->hobi = $request->hobi;
        $mtsputri->cita_cita = $request->cita_cita;
        $mtsputri->anak_ke = $request->anak_ke;
        $mtsputri->jumlah_saudara = $request->jumlah_saudara;
        $mtsputri->tgl_masuk = $request->tgl_masuk;
        $mtsputri->kks = $request->kks;
        $mtsputri->pkh = $request->pkh;
        $mtsputri->kip = $request->kip;
        $mtsputri->jenjang_pendidikan_sebelumnya = $request->jenjang_pendidikan_sebelumnya;
        $mtsputri->status_sekolah_sebelumnya = $request->status_sekolah_sebelumnya;
        $mtsputri->nama_sekolah_sebelumnya = $request->nama_sekolah_sebelumnya;
        $mtsputri->npsn_sekolah_sebelumnya = $request->npsn_sekolah_sebelumnya;
        $mtsputri->alamat_sekolah_sebelumnya = $request->alamat_sekolah_sebelumnya;
        $mtsputri->kecamatan_sekolah_sebelumnya = $request->kecamatan_sekolah_sebelumnya;
        $mtsputri->kabupaten_sekolah_sebelumnya = $request->kabupaten_sekolah_sebelumnya;
        $mtsputri->provinsi_sekolah_sebelumnya = $request->provinsi_sekolah_sebelumnya;
        $mtsputri->nik_ayah = $request->nik_ayah;
        $mtsputri->nama_ayah = $request->nama_ayah;
        $mtsputri->tempat_lahir_ayah = $request->tempat_lahir_ayah;
        $mtsputri->tanggal_lahir_ayah = $request->tanggal_lahir_ayah;
        $mtsputri->status_ayah = $request->status_ayah;
        $mtsputri->no_hp_ayah = $request->no_hp_ayah;
        $mtsputri->pendidikan_ayah = $request->pendidikan_ayah;
        $mtsputri->pekerjaan_ayah = $request->pekerjaan_ayah;
        $mtsputri->penghasilan_ayah = $request->penghasilan_ayah;
        $mtsputri->nik_ibu = $request->nik_ibu;
        $mtsputri->nama_ibu = $request->nama_ibu;
        $mtsputri->tempat_lahir_ibu = $request->tempat_lahir_ibu;
        $mtsputri->tanggal_lahir_ibu = $request->tanggal_lahir_ibu;
        $mtsputri->status_ibu = $request->status_ibu;
        $mtsputri->no_hp_ibu = $request->no_hp_ibu;
        $mtsputri->pendidikan_ibu = $request->pendidikan_ibu;
        $mtsputri->pekerjaan_ibu = $request->pekerjaan_ibu;
        $mtsputri->penghasilan_ibu = $request->penghasilan_ibu;
        $mtsputri->status_milik = $request->status_milik;
        $mtsputri->alamat_rumah_tinggal = $request->alamat_rumah_tinggal;
        $mtsputri->rt = $request->rt;
        $mtsputri->rw = $request->rw;
        $mtsputri->desa = $request->desa;
        $mtsputri->kecamatan = $request->kecamatan;
        $mtsputri->kabupaten = $request->kabupaten;
        $mtsputri->provinsi = $request->provinsi;
        $mtsputri->kode_pos = $request->kode_pos;


        $mtsputri->save();

        if ($request->image != "") {
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = uniqid() . '_' . time() . '.' . $ext;

            $image->move(public_path('storage/'), $imageName);
            $santri->image = $imageName;
            $santri->save();
        }

        if ($request->image2 != "") {
            $image2 = $request->image2;
            $ext2 = $image2->getClientOriginalExtension();
            $image2Name = uniqid() . '_' . time() . '.' . $ext2;

            $image2->move(public_path('storage/'), $image2Name);
            $santri->image2 = $image2Name;
            $santri->save();
        }

        return redirect()->route('mtsputris.index')->with('success', 'Santri added successfully.');
    }

    // This method will show edit santri page
    public function edit($id)
    {
        $santri = Santri::findOrFail($id);
        return view('mtsputris.edit', [
            'santri' => $santri
        ]);
    }

    // This method will update a santri
    public function update($id, Request $request)
    {
        $santri = Santri::findOrFail($id);

        $rules = [
            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'price' => 'required|numeric'
        ];

        if ($request->image != "") {
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('mtsputris.edit', $santri->id)->withInput()->withErrors($validator);
        }

        $santri->name = $request->name;
        $santri->sku = $request->sku;
        $santri->price = $request->price;
        $santri->description = $request->description;
        $santri->save();

        if ($request->image != "") {
            File::delete(public_path('storage/' . $santri->image));

            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;

            $image->move(public_path('storage/'), $imageName);
            $santri->image = $imageName;
            $santri->save();
        }

        return redirect()
        ->route('mtsputris.pdf', ['id' => $santri->id])
        ->with('success', 'Santri dengan nama ' . $santri->nama . ' berhasil ditambahkan dan PDF siap diunduh.');
    }

    // This method will delete a santri
    public function destroy($id)
    {
        $santri = Santri::findOrFail($id);

        File::delete(public_path('storage/' . $santri->image));
        File::delete(public_path('storage/' . $santri->image2));

        $santri->delete();

        return redirect()->route('mtsputris.index')->with('success', 'Santri deleted successfully.');
    }
}
