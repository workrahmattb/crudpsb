<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SantriController extends Controller
{
    // This method will show santris page
    public function index()
    {
        $santris = Santri::orderBy('created_at', 'DESC')->paginate(3);

        return view('santris.listsantri', [
            'santris' => $santris
        ]);
    }

    // This method will show create santri page
    public function create()
    {
        return view('santris.create');
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
        ]);

        if ($validator->fails()) {
            return redirect()
            ->route('santris.create')
            ->withInput()
            ->withErrors($validator)
            ->with('error_message', 'Silakan periksa kembali data yang dimasukkan.');
        }

        // here we will insert santri in db
        $santri = new Santri();
        $santri->nama = $request->nama;
        $santri->tempat_lahir = $request->tempat_lahir;
        $santri->tanggal_lahir = $request->tanggal_lahir;
        $santri->nik = $request->nik;
        $santri->kk = $request->kk;
        $santri->nama_kk = $request->nama_kk;
        $santri->nisn = $request->nisn;
        $santri->nis = $request->nis;
        $santri->tk = $request->tk;
        $santri->paud = $request->paud;
        $santri->hobi = $request->hobi;
        $santri->cita_cita = $request->cita_cita;
        $santri->save();

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

        return redirect()->route('santris.index')->with('success', 'Santri added successfully.');
    }

    // This method will show edit santri page
    public function edit($id)
    {
        $santri = Santri::findOrFail($id);
        return view('santris.edit', [
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
            return redirect()->route('santris.edit', $santri->id)->withInput()->withErrors($validator);
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

        return redirect()->route('santris.index')->with('success', 'Santri updated successfully.');
    }

    // This method will delete a santri
    public function destroy($id)
    {
        $santri = Santri::findOrFail($id);

        File::delete(public_path('storage/' . $santri->image));
        File::delete(public_path('storage/' . $santri->image2));

        $santri->delete();

        return redirect()->route('santris.index')->with('success', 'Santri deleted successfully.');
    }
}
