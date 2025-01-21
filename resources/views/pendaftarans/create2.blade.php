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
        img {
            max-width: 200px;
            margin-top: 10px;
            display: none;
        }
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
                  <a href="/pendaftarans/create" class="bg-green-500 text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:bg-white-100 hover:text-black">Daftar</a>
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
        <div class="container mx-auto flex flex-col items-center justify-center text-left py-20 px-6">
          <h1 class="text-4xl md:text-6xl font-bold mb-6">Welcome to <br/> Pondok Pesantren Syafa'aturrasul</h1>
          <p class="sm:text-left md:text-center lg:text-right">Langkah mengisi formulir :
                <br/> 1. Membayar Uang Formulir Rp. 200.000 Transfer Ke Bank Riau Kepri Syariah 8253122288  a.n Pondok Pesantren Syafa'aturrasul
                <br/> 2. Simpan bukti transfer untuk di upload di form isian data Santriwati baru
                <br/> 3. Isi form dibawah ini dengan Data yang benar
              </p>
        </div>
      </section>

    <div class="container mx-auto my-4">

                            @if (Session::has('error_message'))
                            <div class="mb-4">
                                <div class="bg-red-100 border border-red-400 text-black-700 px-4 py-3 rounded relative" role="alert">
                                    {{ Session::get('error_message') }}
                                </div>
                            </div>
                            @endif
        <div class="flex justify-center">
            <div class="w-full max-w-2xl bg-white shadow-lg rounded-lg">
                <div class="bg-green-500 p-4 rounded-t-lg">
                    <h3 class="text-white text-xl">Isi Data Daftar PSB</h3>
                </div>

                <form id="myForm" enctype="multipart/form-data" action="{{ route('pendaftarans.store') }}" method="post" class="p-4">
                    @csrf
                    <!-- NISN -->
                    <div class="mb-4">
                        <label for="nisn" class="block text-lg font-medium text-gray-700">NISN</label>
                        <small class="text-sm text-gray-500 italic mt-1">Nomor Induk Siswa Nasional</small>
                        <input
                            value="{{ old('nisn') }}"
                            type="number"
                            id="nisn"
                            name="nisn"
                            maxlength="10"
                            pattern="\d{10}"
                            oninput="this.value = this.value.replace(/\D/g, '').slice(0, 10);"
                            class="form-control w-full p-3 rounded-lg border @error('nisn') border-red-500 @enderror">
                        @error('nisn')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nama -->
                    <div class="mb-4">
                        <label for="nama" class="block text-lg font-medium text-gray-700">Nama</label>
                        <input value="{{ old('nama') }}" type="text" id="nama" name="nama"
                            class="form-control w-full p-3 rounded-lg border @error('nama') border-red-500 @enderror">
                        @error('nama')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jenjang Pendidikan -->
                    <div class="mb-4">
                        <label for="jenjangpendidikan" class="block text-lg font-medium text-gray-700">Jenjang Pendidikan Yang Dituju</label>
                        <small class="text-sm text-gray-500 italic mt-1">MTs Putra/Putri & MA Putra/Putri</small>
                        <select
                            value="{{ old('jenjangpendidikan') }}"
                            type="text"
                            id="jenjangpendidikan"
                            name="jenjangpendidikan"
                            class="form-control w-full p-3 rounded-lg border @error('jenjangpendidikan') border-red-500 @enderror">
                            <option value="" disabled selected>Pilih Jenjang Pendidikan</option>
                            <option value="MTs Putri Syafa'aturrasul (Perempuan)"
                                {{ old('jenjangpendidikan') == "MTs Putri Syafa'aturrasul (Perempuan)" ? 'selected' : '' }}>
                                MTs Putri Syafa'aturrasul (Perempuan)
                            </option>
                            <option value="MTs Putra Syafa'aturrasul (Laki-Laki)"
                                {{ old('jenjangpendidikan') == "MTs Putra Syafa'aturrasul (Laki-Laki)" ? 'selected' : '' }}>
                                MTs Putra Syafa'aturrasul (Laki-Laki)
                            </option>
                            <option value="MA Putri Syafa'aturrasul (Perempuan)"
                                {{ old('jenjangpendidikan') == "MA Putri Syafa'aturrasul (Perempuan)" ? 'selected' : '' }}>
                                MA Putri Syafa'aturrasul (Perempuan)
                            </option>
                            <option value="MA Putra Syafa'aturrasul (Laki-Laki)"
                                {{ old('jenjangpendidikan') == "MA Putra Syafa'aturrasul (Laki-Laki)" ? 'selected' : '' }}>
                                MA Putra Syafa'aturrasul (Laki-Laki)
                            </option>
                        </select>



                        <span class="error" id="jenjangpendidikanError"></span>
                        @error('jenjangpendidikan')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>



                    <!-- Alamat -->
                    <div class="mb-4">
                        <label for="alamat" class="block text-lg font-medium text-gray-700">Alamat</label>
                        <small class="text-sm text-gray-500 italic mt-1">Alamat Lengkap, Contoh : Desa Kopah, Kec.Kuantan Tengah, Kab.Kuantan Singingi, Riau</small>
                        <textarea id="alamat" name="alamat"
                            class="form-control w-full p-3 rounded-lg border @error('alamat') border-red-500 @enderror">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Sekolah Asal -->
                    <div class="mb-4">
                        <label for="sekolahasal" class="block text-lg font-medium text-gray-700">Sekolah Asal</label>
                        <small class="text-sm text-gray-500 italic mt-1">Contoh : SDN 01 Teluk Kuantan</small>
                        <input value="{{ old('sekolahasal') }}" type="text" id="sekolahasal" name="sekolahasal"
                            class="form-control w-full p-3 rounded-lg border @error('sekolahasal') border-red-500 @enderror">
                        @error('sekolahasal')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tempat Lahir -->
                    <div class="mb-4">
                        <label for="tempat_lahir" class="block text-lg font-medium text-gray-700">Tempat Lahir</label>
                        <input value="{{ old('tempat_lahir') }}" type="text" id="tempat_lahir" name="tempat_lahir"
                            class="form-control w-full p-3 rounded-lg border @error('tempat_lahir') border-red-500 @enderror">
                        @error('tempat_lahir')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="mb-4">
                        <label for="tanggal_lahir" class="block text-lg font-medium text-gray-700">Tanggal Lahir</label>
                        <input value="{{ old('tanggal_lahir') }}" type="date" id="tanggal_lahir" name="tanggal_lahir"
                            class="form-control w-full p-3 rounded-lg border @error('tanggal_lahir') border-red-500 @enderror">
                        @error('tanggal_lahir')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nama Ayah -->
                    <div class="mb-4">
                        <label for="nama_ayah" class="block text-lg font-medium text-gray-700">Nama Ayah</label>
                        <input value="{{ old('nama_ayah') }}" type="text" id="nama_ayah" name="nama_ayah"
                            class="form-control w-full p-3 rounded-lg border @error('nama_ayah') border-red-500 @enderror">
                        @error('nama_ayah')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nama Ibu -->
                    <div class="mb-4">
                        <label for="nama_ibu" class="block text-lg font-medium text-gray-700">Nama Ibu</label>
                        <input value="{{ old('nama_ibu') }}" type="text" id="nama_ibu" name="nama_ibu"
                            class="form-control w-full p-3 rounded-lg border @error('nama_ibu') border-red-500 @enderror">
                        @error('nama_ibu')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nama Wali -->
                    <div class="mb-4">
                        <label for="nama_wali" class="block text-lg font-medium text-gray-700">Nama Wali</label>
                        <input value="{{ old('nama_wali') }}" type="text" id="nama_wali" name="nama_wali"
                            class="form-control w-full p-3 rounded-lg border @error('nama_wali') border-red-500 @enderror">
                        @error('nama_wali')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- No HP -->
                    <div class="mb-4">
                        <label for="nohp" class="block text-lg font-medium text-gray-700">Nomor HP/ Whatsapp</label>
                        <input value="{{ old('nohp') }}" type="number" id="nohp" name="nohp"
                            class="form-control w-full p-3 rounded-lg border @error('nohp') border-red-500 @enderror">
                        @error('nohp')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="buktitransfer" class="block text-lg font-medium text-gray-700">Bukti Transfer</label>
                        <small class="text-sm text-gray-500 italic mt-1">Upload Bukti Transfer</small>
                        <input
                            type="file"
                            id="buktitransfer"
                            onchange="previewPhoto(event)"
                            name="buktitransfer"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    @error('buktitransfer')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                    {{-- <br>
                    <img id="buktitransferPreview" alt="Photo Preview">
                    <br> --}}
                    </div>

                    <div  class="mt-4">
                        <p class="text-sm text-gray-500">Image preview will appear here.</p>
                        <img id="buktitransferPreview" alt="Photo Preview">
                    </div>


                    <div class="mb-4">
                        <button type="submit" class="w-full bg-green-800 text-white py-3 rounded-lg hover:bg-blue-500">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="bg-green-500 text-white py-6">
        <div class="container mx-auto text-center">
          <p>Ponpes Syafa'aturrasul Kuantan Singingi 2025</p>
        </div>
      </footer>

      <script>
        function previewPhoto(event) {
            const photoInput = event.target;
            const buktitransferPreview = document.getElementById('buktitransferPreview');

            if (photoInput.files && photoInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    buktitransferPreview.src = e.target.result;
                    buktitransferPreview.style.display = 'block';
                };

                reader.readAsDataURL(photoInput.files[0]);
            }
        }
    </script>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.5.4/dist/flowbite.bundle.min.js"></script>
</html>
