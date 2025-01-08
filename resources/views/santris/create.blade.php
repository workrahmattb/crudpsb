<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Laravel 11 CRUD</title>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@1.5.4/dist/flowbite.min.css" rel="stylesheet">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        .step { display: none; }
        .step.active { display: block; }
    </style>
</head>
  <body class="bg-gray-100 text-gray-800">

    <header class="bg-white shadow-md">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
          <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
              <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
              <a href="https://syafaaturrasul.com" class="flex items-center space-x-3 rtl:space-x-reverse">
                  <img src="https://syafaaturrasul.com/wp-content/uploads/2025/01/PONDOK-PESANTREN-SYAFAATURRASUL-3-1536x384.jpg" class="h-10" alt="Flowbite Logo">
                  <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"></span>
              </a>
              <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                  <a href="/santri/create" class="bg-green-500 text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:bg-white-100 hover:text-black">Daftar</a>
                  <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                  <span class="sr-only">Open main menu</span>
                  <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                  </svg>
              </button>
              </div>
              <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
              <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                  <li>
                  <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
                  </li>
                  <li>
                  <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                  </li>
                  <li>
                  <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                  </li>
                  <li>
                  <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                  </li>
              </ul>
              </div>
              </div>
          </nav>

        </div>
      </header>

      <section class="bg-green-500 text-white">
        <div class="container mx-auto flex flex-col items-center justify-center text-center py-12 px-2">
          <h1 class="text-4xl md:text-6xl font-bold mb-6">Welcome to <br/> Pondok Pesantren Syafa'aturrasul</h1>
          <p class="text-lg md:text-xl mb-8">Mohon diisi Formulir Daftar Ulang</p>
        </div>
      </section>

      <div class="container mx-auto my-4">
        <div class="flex justify-end mb-4">
            <a href="{{ route('santris.index') }}" class="btn btn-dark text-white bg-green-500 px-4 py-2 rounded-lg hover:bg-gray-600">Back</a>
        </div>

        <div class="flex justify-center">
            <div class="w-full max-w-2xl bg-white shadow-lg rounded-lg">

                <div class="bg-green-500 p-4 rounded-t-lg">
                    <h3 class="text-white text-xl">Daftar Ulang Santri/wati Baru Tahun Ajaran 2025/2026</h3>
                </div>

                @if (Session::has('error_message'))
                <div class="mb-4">
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        {{ Session::get('error_message') }}
                    </div>
                </div>
                @endif


                <form enctype="multipart/form-data" action="{{ route('santris.store') }}" method="post" class="p-4">
                    @csrf


                    <!-- ini untuk percobaan -->
                <div class="step active">
                    <div class="mb-4">
                        <label for="nama" class="block text-lg font-medium text-gray-700">Nama Santri/wati</label>
                        <small class="text-sm text-gray-500 italic mt-1">Nama Lengkap Sesuai Ijazah</small>
                        <input value="{{ old('nama') }}" type="text" id="nama" name="nama"
                            class="form-control w-full p-3 rounded-lg border @error('nama') border-red-500  @enderror">
                            <span class="error" id="namaError"></span>
                        @error('nama')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tempat_lahir" class="block text-lg font-medium text-gray-700">Tempat Lahir</label>
                        <input value="{{ old('tempat_lahir') }}" type="text" id="tempat_lahir" name="tempat_lahir"
                            class="form-control w-full p-3 rounded-lg border @error('tempat_lahir') border-red-500  @enderror">
                        @error('tempat_lahir')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tanggal_lahir" class="block text-lg font-medium text-gray-700">Tanggal Lahir</label>
                        <input value="{{ old('tanggal_lahir') }}" type="date" id="tanggal_lahir" name="tanggal_lahir"
                            class="form-control w-full p-3 rounded-lg border @error('tanggal_lahir') border-red-500  @enderror">
                        @error('tanggal_lahir')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="button" onclick="nextStep()">Next</button>
                </div>

                <!-- end step 1 -->


                <!-- start step 2 -->
                <div class="step">
                    <div class="mb-4">
                        <label for="nik" class="block text-lg font-medium text-gray-700">Nomor NIK</label>
                        <small class="text-sm text-gray-500 italic mt-1">Nomor Induk Kependudukan Anak</small>
                        <input value="{{ old('nik') }}" type="number" id="nik" name="nik"
                            class="form-control w-full p-3 rounded-lg border @error('nik') border-red-500  @enderror">
                        @error('nik')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="kk" class="block text-lg font-medium text-gray-700">Nomor KK</label>
                        <small class="text-sm text-gray-500 italic mt-1">Nomor Kartu Keluarga</small>
                        <input value="{{ old('kk') }}" type="number" id="kk" name="kk"
                            class="form-control w-full p-3 rounded-lg border @error('kk') border-red-500  @enderror">
                        @error('kk')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nama_kk" class="block text-lg font-medium text-gray-700">Nama Kepala Keluarga</label>

                        <input value="{{ old('nama_kk') }}" type="text" id="nama_kk" name="nama_kk"
                            class="form-control w-full p-3 rounded-lg border @error('nama_kk') border-red-500  @enderror">
                        @error('nama_kk')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nisn" class="block text-lg font-medium text-gray-700">NISN</label>
                        <small class="text-sm text-gray-500 italic mt-1">Nomor Induk Siswa Nasional *Wajid diisi</small>
                        <input value="{{ old('nisn') }}" type="number" id="nisn" name="nisn"
                            class="form-control w-full p-3 rounded-lg border @error('nisn') border-red-500  @enderror">
                        @error('nisn')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>



                    <button type="button" onclick="prevStep()">Back</button>
                    <button type="button" onclick="nextStep()">Next</button>
                </div>
                    <!-- end step 2 -->


                    <!-- step finish -->
                <div class="step">
                    <div class="mb-4">
                        <label for="tk" class="block text-lg font-medium text-gray-700">TK</label>
                        <small class="text-sm text-gray-500 italic mt-1">Pernah Ikut Taman Kanak-Kanak?</small>
                        <select
                            value="{{ old('tk') }}"
                            type="text" id="tk"
                            name="tk"

                            class="form-control w-full p-3 rounded-lg border @error('tk') border-red-500  @enderror">
                            <option value="">Pilih</option>
                            <option value="ya" {{ old('tk') == 'ya' ? 'selected' : '' }}>Iya</option>
                            <option value="tidak" {{ old('tk') == 'tidak' ? 'selected' : '' }}>Tidak</option>
                        </select>
                        @error('tk')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="paud" class="block text-lg font-medium text-gray-700">PAUD</label>
                        <small class="text-sm text-gray-500 italic mt-1">Pernah Ikut Pendidikan Anak Usia Dini?</small>
                        <select
                            value="{{ old('paud') }}"
                            type="text"
                            id="paud"
                            name="paud"

                            class="form-control w-full p-3 rounded-lg border @error('paud') border-red-500  @enderror">
                            <option value="">Pilih</option>
                            <option value="ya" {{ old('paud') == 'ya' ? 'selected' : '' }}>Iya</option>
                            <option value="tidak" {{ old('paud') == 'tidak' ? 'selected' : '' }}>Tidak</option>
                        </select>
                        @error('paud')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="hobi" class="block text-lg font-medium text-gray-700">Hobi</label>
                        <input value="{{ old('hobi') }}" type="text" id="hobi" name="hobi"
                            class="form-control w-full p-3 rounded-lg border @error('hobi') border-red-500  @enderror">
                        @error('hobi')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="cita_cita" class="block text-lg font-medium text-gray-700">Cita-cita</label>
                        <input value="{{ old('cita_cita') }}" type="text" id="cita_cita" name="cita_cita"
                            class="form-control w-full p-3 rounded-lg border @error('cita_cita') border-red-500  @enderror">
                        @error('cita_cita')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="anak_ke" class="block text-lg font-medium text-gray-700">Anak Ke</label>
                        <small class="text-sm text-gray-500 italic mt-1">Nomor urut anak</small>
                        <input
                            value="{{ old('anak_ke') }}"
                            type="number"
                            id="anak_ke"
                            name="anak_ke"

                            class="form-control w-full p-3 rounded-lg border @error('anak_ke') border-red-500 @enderror">
                        @error('anak_ke')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="jumlah_saudara" class="block text-lg font-medium text-gray-700">Jumlah Saudara</label>
                        <small class="text-sm text-gray-500 italic mt-1">Total jumlah saudara kandung</small>
                        <input
                            value="{{ old('jumlah_saudara') }}"
                            type="number"
                            id="jumlah_saudara"
                            name="jumlah_saudara"

                            class="form-control w-full p-3 rounded-lg border @error('jumlah_saudara') border-red-500 @enderror">
                        @error('jumlah_saudara')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="kks" class="block text-lg font-medium text-gray-700">KKS</label>
                        <small class="text-sm text-gray-500 italic mt-1">Nomor Kartu Keluarga Sejahtera (Opsional)</small>
                        <input
                            value="{{ old('kks') }}"
                            type="number"
                            id="kks"
                            name="kks"

                            class="form-control w-full p-3 rounded-lg border @error('kks') border-red-500 @enderror">
                        @error('kks')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="pkh" class="block text-lg font-medium text-gray-700">PKH</label>
                        <small class="text-sm text-gray-500 italic mt-1">Nomor Program Keluarga Harapan (Opsional)</small>
                        <input
                            value="{{ old('pkh') }}"
                            type="number"
                            id="pkh"
                            name="pkh"

                            class="form-control w-full p-3 rounded-lg border @error('pkh') border-red-500 @enderror">
                        @error('pkh')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="kip" class="block text-lg font-medium text-gray-700">KIP</label>
                        <small class="text-sm text-gray-500 italic mt-1">Nomor Kartu Indonesia Pintar (Opsional)</small>
                        <input
                            value="{{ old('kip') }}"
                            type="number"
                            id="kip"
                            name="kip"

                            class="form-control w-full p-3 rounded-lg border @error('kip') border-red-500 @enderror">
                        @error('kip')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>


                    <button type="button" onclick="prevStep()">Back</button>
                    <button type="button" onclick="nextStep()">Next</button>
                </div>

                <!-- end step 2 -->


                <!-- step selanjutnya -->


                <div class="step">

                    <div class="mb-4">
                        <label for="jenjang_pendidikan_sebelumnya" class="block text-lg font-medium text-gray-700">Jenjang Pendidikan Sebelumnya</label>
                        <small class="text-sm text-gray-500 italic mt-1">Contoh: SD, SMP</small>
                        <select
                            value="{{ old('jenjang_pendidikan_sebelumnya') }}"
                            type="text"
                            id="jenjang_pendidikan_sebelumnya"
                            name="jenjang_pendidikan_sebelumnya"

                            class="form-control w-full p-3 rounded-lg border @error('jenjang_pendidikan_sebelumnya') border-red-500 @enderror">
                            <option value="">Pilih Jenjang Pendidikan</option>
                            <option value="SD" {{ old('jenjang_pendidikan_sebelumnya') == 'SD' ? 'selected' : '' }}>SD / MI</option>
                            <option value="SMP" {{ old('jenjang_pendidikan_sebelumnya') == 'SMP' ? 'selected' : '' }}>SMP / MTs</option>
                        </select>


                        <span class="error" id="jenjang_pendidikan_sebelumnyaError"></span>
                        @error('jenjang_pendidikan_sebelumnya')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="status_sekolah_sebelumnya" class="block text-lg font-medium text-gray-700">Status Sekolah Sebelumnya</label>
                        <small class="text-sm text-gray-500 italic mt-1">Contoh: Negeri, Swasta</small>
                        <select
                            value="{{ old('status_sekolah_sebelumnya') }}"
                            type="text"
                            id="status_sekolah_sebelumnya"
                            name="status_sekolah_sebelumnya"

                            class="form-control w-full p-3 rounded-lg border @error('status_sekolah_sebelumnya') border-red-500 @enderror">
                            <option value="">Pilih Status Sekolah</option>
                            <option value="Negeri" {{ old('status_sekolah_sebelumnya') == 'Negeri' ? 'selected' : '' }}>Negeri</option>
                            <option value="Swasta" {{ old('status_sekolah_sebelumnya') == 'Swasta' ? 'selected' : '' }}>Swasta</option>
                        </select>
                        @error('status_sekolah_sebelumnya')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nama_sekolah_sebelumnya" class="block text-lg font-medium text-gray-700">Nama Sekolah Sebelumnya</label>
                        <small class="text-sm text-gray-500 italic mt-1">Contoh: SD Negeri 1 Teluk Kuantan</small>
                        <input
                            value="{{ old('nama_sekolah_sebelumnya') }}"
                            type="text"
                            id="nama_sekolah_sebelumnya"
                            name="nama_sekolah_sebelumnya"

                            class="form-control w-full p-3 rounded-lg border @error('nama_sekolah_sebelumnya') border-red-500 @enderror">
                        @error('nama_sekolah_sebelumnya')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="npsn_sekolah_sebelumnya" class="block text-lg font-medium text-gray-700">NPSN Sekolah Sebelumnya</label>
                        <small class="text-sm text-gray-500 italic mt-1">Nomor Pokok Sekolah Nasional</small>
                        <input
                            value="{{ old('npsn_sekolah_sebelumnya') }}"
                            type="number"
                            id="npsn_sekolah_sebelumnya"
                            name="npsn_sekolah_sebelumnya"

                            class="form-control w-full p-3 rounded-lg border @error('npsn_sekolah_sebelumnya') border-red-500 @enderror">
                        @error('npsn_sekolah_sebelumnya')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="alamat_sekolah_sebelumnya" class="block text-lg font-medium text-gray-700">Alamat Sekolah Sebelumnya</label>

                        <input
                            value="{{ old('alamat_sekolah_sebelumnya') }}"
                            type="text"
                            id="alamat_sekolah_sebelumnya"
                            name="alamat_sekolah_sebelumnya"

                            class="form-control w-full p-3 rounded-lg border @error('alamat_sekolah_sebelumnya') border-red-500 @enderror">
                        @error('alamat_sekolah_sebelumnya')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="kecamatan_sekolah_sebelumnya" class="block text-lg font-medium text-gray-700">Kecamatan Sekolah Sebelumnya</label>

                        <input
                            value="{{ old('kecamatan_sekolah_sebelumnya') }}"
                            type="text"
                            id="kecamatan_sekolah_sebelumnya"
                            name="kecamatan_sekolah_sebelumnya"

                            class="form-control w-full p-3 rounded-lg border @error('kecamatan_sekolah_sebelumnya') border-red-500 @enderror">
                        @error('kecamatan_sekolah_sebelumnya')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="kabupaten_sekolah_sebelumnya" class="block text-lg font-medium text-gray-700">Kabupaten Sekolah Sebelumnya</label>

                        <input
                            value="{{ old('kabupaten_sekolah_sebelumnya') }}"
                            type="text"
                            id="kabupaten_sekolah_sebelumnya"
                            name="kabupaten_sekolah_sebelumnya"

                            class="form-control w-full p-3 rounded-lg border @error('kabupaten_sekolah_sebelumnya') border-red-500 @enderror">
                        @error('kabupaten_sekolah_sebelumnya')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="provinsi_sekolah_sebelumnya" class="block text-lg font-medium text-gray-700">Provinsi Sekolah Sebelumnya</label>

                        <input
                            value="{{ old('provinsi_sekolah_sebelumnya') }}"
                            type="text"
                            id="provinsi_sekolah_sebelumnya"
                            name="provinsi_sekolah_sebelumnya"

                            class="form-control w-full p-3 rounded-lg border @error('provinsi_sekolah_sebelumnya') border-red-500 @enderror">
                        @error('provinsi_sekolah_sebelumnya')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>


                    <button type="button" onclick="prevStep()">Back</button>
                    <button type="button" onclick="nextStep()">Next</button>
                </div>

                <div class="step">
                    <div class="px-6 py-3">
                        <a class="block text-center items-center space-x-3 rtl:space-x-reverse bg-green-500 text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:bg-white-100 hover:text-black">Data Ayah</a>
                    </div>
                    <div class="mb-4">
                        <label for="nik_ayah" class="block text-lg font-medium text-gray-700">NIK Ayah</label>
                        <input value="{{ old('nik_ayah') }}" type="text" id="nik_ayah" name="nik_ayah" placeholder="NIK Ayah"
                            class="form-control w-full p-3 rounded-lg border @error('nik_ayah') border-red-500 @enderror">
                        <span class="error" id="nikAyahError"></span>
                        @error('nik_ayah')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nama_ayah" class="block text-lg font-medium text-gray-700">Nama Ayah</label>
                        <input value="{{ old('nama_ayah') }}" type="text" id="nama_ayah" name="nama_ayah" placeholder="Nama Ayah"
                            class="form-control w-full p-3 rounded-lg border @error('nama_ayah') border-red-500 @enderror">
                        <span class="error" id="namaAyahError"></span>
                        @error('nama_ayah')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tempat_lahir_ayah" class="block text-lg font-medium text-gray-700">Tempat Lahir Ayah</label>
                        <input value="{{ old('tempat_lahir_ayah') }}" type="text" id="tempat_lahir_ayah" name="tempat_lahir_ayah" placeholder="Tempat Lahir Ayah"
                            class="form-control w-full p-3 rounded-lg border @error('tempat_lahir_ayah') border-red-500 @enderror">
                        <span class="error" id="tempatLahirAyahError"></span>
                        @error('tempat_lahir_ayah')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tanggal_lahir_ayah" class="block text-lg font-medium text-gray-700">Tanggal Lahir Ayah</label>
                        <input value="{{ old('tanggal_lahir_ayah') }}" type="date" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah"
                            class="form-control w-full p-3 rounded-lg border @error('tanggal_lahir_ayah') border-red-500 @enderror">
                        <span class="error" id="tanggalLahirAyahError"></span>
                        @error('tanggal_lahir_ayah')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="status_ayah" class="block text-lg font-medium text-gray-700">Status Ayah</label>
                        <input value="{{ old('status_ayah') }}" type="text" id="status_ayah" name="status_ayah" placeholder="Status Ayah"
                            class="form-control w-full p-3 rounded-lg border @error('status_ayah') border-red-500 @enderror">
                        <span class="error" id="statusAyahError"></span>
                        @error('status_ayah')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="no_hp_ayah" class="block text-lg font-medium text-gray-700">No. HP Ayah</label>
                        <input value="{{ old('no_hp_ayah') }}" type="text" id="no_hp_ayah" name="no_hp_ayah" placeholder="No. HP Ayah"
                            class="form-control w-full p-3 rounded-lg border @error('no_hp_ayah') border-red-500 @enderror">
                        <span class="error" id="noHpAyahError"></span>
                        @error('no_hp_ayah')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="pendidikan_ayah" class="block text-lg font-medium text-gray-700">Pendidikan Ayah</label>
                        <select
                            value="{{ old('pendidikan_ayah') }}"
                            type="text"
                            id="pendidikan_ayah"
                            name="pendidikan_ayah"
                            class="form-control w-full p-3 rounded-lg border @error('pendidikan_ayah') border-red-500 @enderror">
                            <option value="">Pilih Pendidikan Ayah</option>
                            <option value="SD" {{ old('pendidikan_ayah') == 'SD' ? 'selected' : '' }}>SD</option>
                            <option value="SMP" {{ old('pendidikan_ayah') == 'SMP' ? 'selected' : '' }}>SMP</option>
                            <option value="SMA" {{ old('pendidikan_ayah') == 'SMA' ? 'selected' : '' }}>SMA</option>
                            <option value="D1" {{ old('pendidikan_ayah') == 'D1' ? 'selected' : '' }}>Diploma 1 (D1)</option>
                            <option value="D2" {{ old('pendidikan_ayah') == 'D2' ? 'selected' : '' }}>Diploma 2 (D2)</option>
                            <option value="D3" {{ old('pendidikan_ayah') == 'D3' ? 'selected' : '' }}>Diploma 3 (D3)</option>
                            <option value="S1" {{ old('pendidikan_ayah') == 'S1' ? 'selected' : '' }}>Sarjana (S1)</option>
                            <option value="S2" {{ old('pendidikan_ayah') == 'S2' ? 'selected' : '' }}>Magister (S2)</option>
                            <option value="S3" {{ old('pendidikan_ayah') == 'S3' ? 'selected' : '' }}>Doktoral (S3)</option>
                        </select>
                        <span class="error" id="pendidikanAyahError"></span>
                        @error('pendidikan_ayah')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="pekerjaan_ayah" class="block text-lg font-medium text-gray-700">Pekerjaan Ayah</label>
                        <select
                            value="{{ old('pekerjaan_ayah') }}"
                            type="text"
                            id="pekerjaan_ayah"
                            name="pekerjaan_ayah"
                            class="form-control w-full p-3 rounded-lg border @error('pekerjaan_ayah') border-red-500 @enderror">
                            <option value="">Pilih Pekerjaan Ayah</option>
                            <option value="Tidak Bekerja" {{ old('pekerjaan_ayah') == 'Tidak Bekerja' ? 'selected' : '' }}>Tidak Bekerja</option>
                            <option value="Petani" {{ old('pekerjaan_ayah') == 'Petani' ? 'selected' : '' }}>Petani</option>
                            <option value="Nelayan" {{ old('pekerjaan_ayah') == 'Nelayan' ? 'selected' : '' }}>Nelayan</option>
                            <option value="Buruh" {{ old('pekerjaan_ayah') == 'Buruh' ? 'selected' : '' }}>Buruh</option>
                            <option value="Pegawai Swasta" {{ old('pekerjaan_ayah') == 'Pegawai Swasta' ? 'selected' : '' }}>Pegawai Swasta</option>
                            <option value="PNS" {{ old('pekerjaan_ayah') == 'PNS' ? 'selected' : '' }}>Pegawai Negeri Sipil (PNS)</option>
                            <option value="TNI/Polri" {{ old('pekerjaan_ayah') == 'TNI/Polri' ? 'selected' : '' }}>TNI/Polri</option>
                            <option value="Wiraswasta" {{ old('pekerjaan_ayah') == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                            <option value="Pedagang" {{ old('pekerjaan_ayah') == 'Pedagang' ? 'selected' : '' }}>Pedagang</option>
                            <option value="Guru/Dosen" {{ old('pekerjaan_ayah') == 'Guru/Dosen' ? 'selected' : '' }}>Guru/Dosen</option>
                            <option value="Dokter" {{ old('pekerjaan_ayah') == 'Dokter' ? 'selected' : '' }}>Dokter</option>
                            <option value="Pengacara" {{ old('pekerjaan_ayah') == 'Pengacara' ? 'selected' : '' }}>Pengacara</option>
                            <option value="Notaris" {{ old('pekerjaan_ayah') == 'Notaris' ? 'selected' : '' }}>Notaris</option>
                            <option value="Seniman" {{ old('pekerjaan_ayah') == 'Seniman' ? 'selected' : '' }}>Seniman</option>
                            <option value="Penulis" {{ old('pekerjaan_ayah') == 'Penulis' ? 'selected' : '' }}>Penulis</option>
                            <option value="Pensiunan" {{ old('pekerjaan_ayah') == 'Pensiunan' ? 'selected' : '' }}>Pensiunan</option>
                            <option value="Lainnya" {{ old('pekerjaan_ayah') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        <span class="error" id="pekerjaanAyahError"></span>
                        @error('pekerjaan_ayah')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="penghasilan_ayah" class="block text-lg font-medium text-gray-700">Penghasilan Ayah</label>
                        <select
                        value="{{ old('penghasilan_ayah') }}"
                        type="text" id="penghasilan_ayah"
                        name="penghasilan_ayah"
                        placeholder="Penghasilan Ayah"
                        class="form-control w-full p-3 rounded-lg border @error('penghasilan_ayah') border-red-500 @enderror">
                        <option value="">Pilih Penghasilan Ayah</option>
                        <option value="0-1 juta" {{ old('penghasilan_ayah') == '0-1 juta' ? 'selected' : '' }}>0 - 1 Juta</option>
                        <option value="1-3 juta" {{ old('penghasilan_ayah') == '1-3 juta' ? 'selected' : '' }}>1 - 3 Juta</option>
                        <option value="3-5 juta" {{ old('penghasilan_ayah') == '3-5 juta' ? 'selected' : '' }}>3 - 5 Juta</option>
                        <option value="5-10 juta" {{ old('penghasilan_ayah') == '5-10 juta' ? 'selected' : '' }}>5 - 10 Juta</option>
                        <option value="10-20 juta" {{ old('penghasilan_ayah') == '10-20 juta' ? 'selected' : '' }}>10 - 20 Juta</option>
                        <option value="20-50 juta" {{ old('penghasilan_ayah') == '20-50 juta' ? 'selected' : '' }}>20 - 50 Juta</option>
                        <option value="50 juta lebih" {{ old('penghasilan_ayah') == '50 juta lebih' ? 'selected' : '' }}>50 Juta Lebih</option>
                        <option value="Tidak Tahu" {{ old('penghasilan_ayah') == 'Tidak Tahu' ? 'selected' : '' }}>Tidak Tahu</option>
                        </select>

                        <span class="error" id="penghasilanAyahError"></span>
                        @error('penghasilan_ayah')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="px-6 py-3">
                        <a class="block text-center items-center space-x-3 rtl:space-x-reverse bg-green-500 text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:bg-white-100 hover:text-black">Data Ibu</a>
                    </div>
                    <!-- For Ibu's information -->
                    <div class="mb-4">
                        <label for="nik_ibu" class="block text-lg font-medium text-gray-700">NIK Ibu</label>
                        <input value="{{ old('nik_ibu') }}" type="text" id="nik_ibu" name="nik_ibu" placeholder="NIK Ibu"
                            class="form-control w-full p-3 rounded-lg border @error('nik_ibu') border-red-500 @enderror">
                        <span class="error" id="nikIbuError"></span>
                        @error('nik_ibu')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nama_ibu" class="block text-lg font-medium text-gray-700">Nama Ibu</label>
                        <input value="{{ old('nama_ibu') }}" type="text" id="nama_ibu" name="nama_ibu" placeholder="Nama Ibu"
                            class="form-control w-full p-3 rounded-lg border @error('nama_ibu') border-red-500 @enderror">
                        <span class="error" id="namaIbuError"></span>
                        @error('nama_ibu')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tempat_lahir_ibu" class="block text-lg font-medium text-gray-700">Tempat Lahir Ibu</label>
                        <input value="{{ old('tempat_lahir_ibu') }}" type="text" id="tempat_lahir_ibu" name="tempat_lahir_ibu" placeholder="Tempat Lahir Ibu"
                            class="form-control w-full p-3 rounded-lg border @error('tempat_lahir_ibu') border-red-500 @enderror">
                        <span class="error" id="tempatLahirIbuError"></span>
                        @error('tempat_lahir_ibu')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tanggal_lahir_ibu" class="block text-lg font-medium text-gray-700">Tanggal Lahir Ibu</label>
                        <input value="{{ old('tanggal_lahir_ibu') }}" type="date" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu"
                            class="form-control w-full p-3 rounded-lg border @error('tanggal_lahir_ibu') border-red-500 @enderror">
                        <span class="error" id="tanggalLahirIbuError"></span>
                        @error('tanggal_lahir_ibu')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="status_ibu" class="block text-lg font-medium text-gray-700">Status Ibu</label>
                        <input value="{{ old('status_ibu') }}" type="text" id="status_ibu" name="status_ibu" placeholder="Status Ibu"
                            class="form-control w-full p-3 rounded-lg border @error('status_ibu') border-red-500 @enderror">
                        <span class="error" id="statusIbuError"></span>
                        @error('status_ibu')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="no_hp_ibu" class="block text-lg font-medium text-gray-700">No. HP Ibu</label>
                        <input value="{{ old('no_hp_ibu') }}" type="text" id="no_hp_ibu" name="no_hp_ibu" placeholder="No. HP Ibu"
                            class="form-control w-full p-3 rounded-lg border @error('no_hp_ibu') border-red-500 @enderror">
                        <span class="error" id="noHpIbuError"></span>
                        @error('no_hp_ibu')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="pendidikan_ibu" class="block text-lg font-medium text-gray-700">Pendidikan Ibu</label>
                        <input value="{{ old('pendidikan_ibu') }}" type="text" id="pendidikan_ibu" name="pendidikan_ibu" placeholder="Pendidikan Ibu"
                            class="form-control w-full p-3 rounded-lg border @error('pendidikan_ibu') border-red-500 @enderror">
                        <span class="error" id="pendidikanIbuError"></span>
                        @error('pendidikan_ibu')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="pekerjaan_ibu" class="block text-lg font-medium text-gray-700">Pekerjaan Ibu</label>
                        <input value="{{ old('pekerjaan_ibu') }}" type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu"
                            class="form-control w-full p-3 rounded-lg border @error('pekerjaan_ibu') border-red-500 @enderror">
                        <span class="error" id="pekerjaanIbuError"></span>
                        @error('pekerjaan_ibu')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="penghasilan_ibu" class="block text-lg font-medium text-gray-700">Penghasilan Ibu</label>
                        <input value="{{ old('penghasilan_ibu') }}" type="text" id="penghasilan_ibu" name="penghasilan_ibu" placeholder="Penghasilan Ibu"
                            class="form-control w-full p-3 rounded-lg border @error('penghasilan_ibu') border-red-500 @enderror">
                        <span class="error" id="penghasilanIbuError"></span>
                        @error('penghasilan_ibu')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-4">
                        <button type="button" onclick="prevStep()">Back</button>
                        <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-500">
                            Submit
                        </button>
                    </div>
                </div>


                </form>

                <script>
                    let currentStep = 0;
                    const steps = document.querySelectorAll('.step');

                    function showStep(step) {
                        steps.forEach((element, index) => {
                            element.classList.toggle('active', index === step);
                        });
                    }

                    function nextStep() {
                        if (currentStep < steps.length - 1) {
                            currentStep++;
                            showStep(currentStep);
                        }
                    }

                    function prevStep() {
                        if (currentStep > 0) {
                            currentStep--;
                            showStep(currentStep);
                        }
                    }

                    function validateStep() {
                        let isValid = true;
                        const currentInputs = steps[currentStep].querySelectorAll('input, textarea');

                        currentInputs.forEach((input) => {
                            const errorElement = document.getElementById(`${input.id}Error`);
                            if (!input.checkValidity()) {
                                errorElement.textContent = input.validationMessage;
                                isValid = false;
                            } else {
                                errorElement.textContent = '';
                            }
                        });

                        return isValid;
                    }
                </script>

            </div>
        </div>
    </div>

    <footer class="bg-green-500 text-white py-6">
        <div class="container mx-auto text-center">
          <p>Ponpes Syafa'aturrasul Kuantan Singingi 2025</p>
        </div>
      </footer></body>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.5.4/dist/flowbite.bundle.min.js"></script>
</html>
