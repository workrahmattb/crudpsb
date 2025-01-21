<?php

namespace App\Http\Controllers;

use App\Models\Daftarulang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class DaftarulangController extends Controller
{
    // This method will show santris page
    public function index()
    {
        $daftarulangs = Daftarulang::orderBy('created_at', 'DESC')->paginate(10);

        return view('daftarulangs.listdaftarulang', [
            'daftarulangs' => $daftarulangs
        ]);
    }

    // This method will show create daftarulang page
    public function create()
    {
        return view('daftarulangs.create');
    }

    // This method will store a daftarulang in db
    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'tempatlahir' => 'required|string|max:255',
            'tanggallahir' => 'required|date',
            'nik' => 'required|numeric|digits:16',
            'kk' => 'required|numeric|digits:16',
            'namakk' => 'required|string|max:255',
            'nisn' => 'nullable|numeric|digits:10',
            'nis' => 'nullable|numeric|digitsbetween:1,10',
            'tk' => 'nullable|string|max:255',
            'paud' => 'nullable|string|max:255',
            'hobi' => 'nullable|string|max:255',
            'citacita' => 'nullable|string|max:255',
            'anakke' => 'nullable|integer|min:1',
            'jumlahsaudara' => 'nullable|integer|min:1',
            'kks' => 'nullable|string|max:255',
            'pkh' => 'nullable|string|max:255',
            'kip' => 'nullable|string|max:255',
            'jenjangpendidikansebelumnya' => 'required|string|max:255',
            'statussekolahsebelumnya' => 'required|string|max:255',
            'namasekolahsebelumnya' => 'required|string|max:255',
            'npsnsekolahsebelumnya' => 'required|string|max:255',
            'alamatsekolahsebelumnya' => 'required|string|max:255',
            'kecamatansekolahsebelumnya' => 'required|string|max:255',
            'kabupatensekolahsebelumnya' => 'required|string|max:255',
            'provinsisekolahsebelumnya' => 'required|string|max:255',
            'nikayah' => 'required|string|max:255',
            'namaayah' => 'required|string|max:255',
            'tempatlahirayah' => 'required|string|max:255',
            'tanggallahirayah' => 'required|date',
            'statusayah' => 'required|string|max:255',
            'nohpayah' => 'nullable|string|max:20',
            'pendidikanayah' => 'nullable|string|max:255',
            'pekerjaanayah' => 'nullable|string|max:255',
            'penghasilanayah' => 'nullable|string|max:255',
            'nikibu' => 'required|string|max:255',
            'namaibu' => 'required|string|max:255',
            'tempatlahiribu' => 'required|string|max:255',
            'tanggallahiribu' => 'required|date',
            'statusibu' => 'required|string|max:255',
            'nohpibu' => 'nullable|string|max:20',
            'pendidikanibu' => 'nullable|string|max:255',
            'pekerjaanibu' => 'nullable|string|max:255',
            'penghasilanibu' => 'nullable|string|max:255',
            'statusmilik' => 'nullable|string|max:255',
            'alamatrumahtinggal' => 'nullable|string|max:255',
            'rt' => 'nullable|string|max:255',
            'rw' => 'nullable|string|max:255',
            'desa' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kodepos' => 'nullable|string|max:255',


        ], [
            'nama.required' => 'Nama wajib diisi.',
            'tempatlahir.required' => 'Tempat lahir wajib diisi.',
            'tanggallahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggallahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
            'nik.required' => 'NIK wajib diisi.',
            'nik.numeric' => 'NIK harus berupa angka.',
            'nik.digits' => 'NIK harus terdiri dari 16 digit.',
            'kk.required' => 'Nomor KK wajib diisi.',
            'kk.numeric' => 'Nomor KK harus berupa angka.',
            'kk.digits' => 'Nomor KK harus terdiri dari 16 digit.',
            'namakk.required' => 'Nama kepala keluarga wajib diisi.',
            'nisn.numeric' => 'NISN harus berupa angka.',
            'nisn.digits' => 'NISN harus terdiri dari 10 digit.',
            'nis.numeric' => 'NIS harus berupa angka.',
            'nis.digitsbetween' => 'NIS harus memiliki panjang antara 1 hingga 10 digit.',
            'hobi.max' => 'Hobi tidak boleh lebih dari 255 karakter.',
            'citacita.max' => 'Cita-cita tidak boleh lebih dari 255 karakter.',
            'jenjangpendidikansebelumnya.required' => 'Jenjang pendidikan sebelumnya wajib diisi.',
            'statussekolahsebelumnya.required' => 'Status sekolah sebelumnya wajib diisi.',
            'namasekolahsebelumnya.required' => 'Nama sekolah sebelumnya wajib diisi.',
            'npsnsekolahsebelumnya.required' => 'NPSN sekolah sebelumnya wajib diisi.',
            'alamatsekolahsebelumnya.required' => 'Alamat sekolah sebelumnya wajib diisi.',
            'kecamatansekolahsebelumnya.required' => 'Kecamatan sekolah sebelumnya wajib diisi.',
            'kabupatensekolahsebelumnya.required' => 'Kabupaten sekolah sebelumnya wajib diisi.',
            'provinsisekolahsebelumnya.required' => 'Provinsi sekolah sebelumnya wajib diisi.',
            'nikayah.required' => 'NIK Ayah wajib diisi.',
            'namaayah.required' => 'Nama Ayah wajib diisi.',
            'tempatlahirayah.required' => 'Tempat Lahir Ayah wajib diisi.',
            'tanggallahirayah.required' => 'Tanggal Lahir Ayah wajib diisi.',
            'tanggallahirayah.date' => 'Tanggal Lahir Ayah harus berupa tanggal yang valid.',
            'statusayah.required' => 'Status Ayah wajib diisi.',
            'nohpayah.required' => 'Nomor HP Ayah wajib diisi.',
            'pendidikanayah.required' => 'Pendidikan Ayah wajib diisi.',
            'pekerjaanayah.required' => 'Pekerjaan Ayah wajib diisi.',
            'penghasilanayah.required' => 'Penghasilan Ayah wajib diisi.',
            'nikibu.required' => 'NIK Ibu wajib diisi.',
            'namaibu.required' => 'Nama Ibu wajib diisi.',
            'tempatlahiribu.required' => 'Tempat Lahir Ibu wajib diisi.',
            'tanggallahiribu.required' => 'Tanggal Lahir Ibu wajib diisi.',
            'tanggallahiribu.date' => 'Tanggal Lahir Ibu harus berupa tanggal yang valid.',
            'statusibu.required' => 'Status Ibu wajib diisi.',
            'nohpibu.required' => 'Nomor HP Ibu wajib diisi.',
            'pendidikanibu.required' => 'Pendidikan Ibu wajib diisi.',
            'pekerjaanibu.required' => 'Pekerjaan Ibu wajib diisi.',
            'penghasilanibu.required' => 'Penghasilan Ibu wajib diisi.',
            'statusmilik.required' => 'Status milik wajib diisi.',
            'desa.required' => 'Desa wajib diisi.',
            'kecamatan.required' => 'Kecamatan wajib diisi.',
            'kabupaten.required' => 'Kabupaten wajib diisi.',
            'provinsi.required' => 'Provinsi wajib diisi.',

        ]);

        if ($validator->fails()) {
            return redirect()
            ->route('daftarulangs.create')
            ->withInput()
            ->withErrors($validator)
            ->with('error_message', 'Silakan periksa kembali data yang dimasukkan.');
        }

        // here we will insert daftarulang in db
        $daftarulang = new Daftarulang();
        $daftarulang->nama = $request->nama;
        $daftarulang->tempatlahir = $request->tempatlahir;
        $daftarulang->tanggallahir = $request->tanggallahir;
        $daftarulang->nik = $request->nik;
        $daftarulang->kk = $request->kk;
        $daftarulang->namakk = $request->namakk;
        $daftarulang->nisn = $request->nisn;
        $daftarulang->nis = $request->nis;
        $daftarulang->tk = $request->tk;
        $daftarulang->paud = $request->paud;
        $daftarulang->hobi = $request->hobi;
        $daftarulang->citacita = $request->citacita;
        $daftarulang->anakke = $request->anakke;
        $daftarulang->jumlahsaudara = $request->jumlahsaudara;
        $daftarulang->tglmasuk = $request->tglmasuk;
        $daftarulang->kks = $request->kks;
        $daftarulang->pkh = $request->pkh;
        $daftarulang->kip = $request->kip;
        $daftarulang->jenjangpendidikansebelumnya = $request->jenjangpendidikansebelumnya;
        $daftarulang->statussekolahsebelumnya = $request->statussekolahsebelumnya;
        $daftarulang->namasekolahsebelumnya = $request->namasekolahsebelumnya;
        $daftarulang->npsnsekolahsebelumnya = $request->npsnsekolahsebelumnya;
        $daftarulang->alamatsekolahsebelumnya = $request->alamatsekolahsebelumnya;
        $daftarulang->kecamatansekolahsebelumnya = $request->kecamatansekolahsebelumnya;
        $daftarulang->kabupatensekolahsebelumnya = $request->kabupatensekolahsebelumnya;
        $daftarulang->provinsisekolahsebelumnya = $request->provinsisekolahsebelumnya;
        $daftarulang->nikayah = $request->nikayah;
        $daftarulang->namaayah = $request->namaayah;
        $daftarulang->tempatlahirayah = $request->tempatlahirayah;
        $daftarulang->tanggallahirayah = $request->tanggallahirayah;
        $daftarulang->statusayah = $request->statusayah;
        $daftarulang->nohpayah = $request->nohpayah;
        $daftarulang->pendidikanayah = $request->pendidikanayah;
        $daftarulang->pekerjaanayah = $request->pekerjaanayah;
        $daftarulang->penghasilanayah = $request->penghasilanayah;
        $daftarulang->nikibu = $request->nikibu;
        $daftarulang->namaibu = $request->namaibu;
        $daftarulang->tempatlahiribu = $request->tempatlahiribu;
        $daftarulang->tanggallahiribu = $request->tanggallahiribu;
        $daftarulang->statusibu = $request->statusibu;
        $daftarulang->nohpibu = $request->nohpibu;
        $daftarulang->pendidikanibu = $request->pendidikanibu;
        $daftarulang->pekerjaanibu = $request->pekerjaanibu;
        $daftarulang->penghasilanibu = $request->penghasilanibu;
        $daftarulang->statusmilik = $request->statusmilik;
        $daftarulang->alamatrumahtinggal = $request->alamatrumahtinggal;
        $daftarulang->rt = $request->rt;
        $daftarulang->rw = $request->rw;
        $daftarulang->desa = $request->desa;
        $daftarulang->kecamatan = $request->kecamatan;
        $daftarulang->kabupaten = $request->kabupaten;
        $daftarulang->provinsi = $request->provinsi;
        $daftarulang->kodepos = $request->kodepos;


        $daftarulang->save();

        if ($request->image != "") {
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = uniqid() . '_' . time() . '.' . $ext;

            $image->move(public_path('storage/'), $imageName);
            $daftarulang->image = $imageName;
            $daftarulang->save();
        }

        if ($request->image2 != "") {
            $image2 = $request->image2;
            $ext2 = $image2->getClientOriginalExtension();
            $image2Name = uniqid() . '_' . time() . '.' . $ext2;

            $image2->move(public_path('storage/'), $image2Name);
            $daftarulang->image2 = $image2Name;
            $daftarulang->save();
        }

        return redirect()->route('daftarulangs.index')->with('success', 'daftarulang added successfully.');
    }

    // This method will show edit daftarulang page
    public function edit($id)
    {
        $daftarulang = daftarulang::findOrFail($id);
        return view('daftarulangs.edit', [
            'daftarulang' => $daftarulang
        ]);
    }

    // This method will update a daftarulang
    public function update($id, Request $request)
    {
        $daftarulang = daftarulang::findOrFail($id);

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
            return redirect()->route('daftarulangs.edit', $daftarulang->id)->withInput()->withErrors($validator);
        }

        $daftarulang->name = $request->name;
        $daftarulang->sku = $request->sku;
        $daftarulang->price = $request->price;
        $daftarulang->description = $request->description;
        $daftarulang->save();

        if ($request->image != "") {
            File::delete(public_path('storage/' . $daftarulang->image));

            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;

            $image->move(public_path('storage/'), $imageName);
            $daftarulang->image = $imageName;
            $daftarulang->save();
        }

        return redirect()
        ->route('daftarulangs.pdf', ['id' => $daftarulang->id])
        ->with('success', 'daftarulang dengan nama ' . $daftarulang->nama . ' berhasil ditambahkan dan PDF siap diunduh.');
    }

    // This method will delete a daftarulang
    public function destroy($id)
    {
        $daftarulang = daftarulang::findOrFail($id);

        File::delete(public_path('storage/' . $daftarulang->image));
        File::delete(public_path('storage/' . $daftarulang->image2));

        $daftarulang->delete();

        return redirect()->route('daftarulangs.index')->with('success', 'daftarulang deleted successfully.');
    }
}
