<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Laravel 11 CRUD</title>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@1.5.4/dist/flowbite.min.css" rel="stylesheet">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
  <body class="bg-gray-100 text-gray-800">

    <header class="bg-white shadow-md">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
          <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
              <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
              <<a href="https://syafaaturrasul.com" class="flex items-center space-x-3 rtl:space-x-reverse">
                  <img src="https://syafaaturrasul.com/wp-content/uploads/2025/01/PONDOK-PESANTREN-SYAFAATURRASUL-3-1536x384.jpg" class="h-10" alt="Flowbite Logo">
                  <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
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
        <div class="container mx-auto flex flex-col items-center justify-center text-center py-20 px-6">
          <h1 class="text-4xl md:text-6xl font-bold mb-6">Welcome to <br/> Pondok Pesantren Syafa'aturrasul</h1>
          <p class="text-lg md:text-xl mb-8">We provide the best solutions for your business needs.</p>
          <a href="/santri/create" class="bg-white text-green-500 px-6 py-3 rounded-full font-semibold shadow-lg hover:bg-gray-100">Daftar</a>
        </div>
      </section>

      <div class="container mx-auto my-4">
        <div class="flex justify-end mb-4">
            <a href="{{ route('santris.index') }}" class="btn btn-dark text-white bg-gray-700 px-4 py-2 rounded-lg hover:bg-gray-600">Back</a>
        </div>

        <div class="flex justify-center">
            <div class="w-full max-w-2xl bg-white shadow-lg rounded-lg">

                <div class="bg-gray-800 p-4 rounded-t-lg">
                    <h3 class="text-white text-xl">Daftar Ulang</h3>
                </div>

                <div class="flex justify-between mb-8">
                    <button id="step-1-btn" class="flex items-center w-full p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white border border-gray-200 rounded-lg shadow-sm dark:text-gray-400 sm:text-base dark:bg-gray-800 dark:border-gray-700 sm:p-4 sm:space-x-4 rtl:space-x-reverse">Step 1</button>
                    <button id="step-2-btn" class="flex items-center w-full p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white border border-gray-200 rounded-lg shadow-sm dark:text-gray-400 sm:text-base dark:bg-gray-800 dark:border-gray-700 sm:p-4 sm:space-x-4 rtl:space-x-reverse">Step 2</button>
                    <button id="step-3-btn" class="flex items-center w-full p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white border border-gray-200 rounded-lg shadow-sm dark:text-gray-400 sm:text-base dark:bg-gray-800 dark:border-gray-700 sm:p-4 sm:space-x-4 rtl:space-x-reverse">Step 3</button>
                    <button id="step-4-btn" class="flex items-center w-full p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white border border-gray-200 rounded-lg shadow-sm dark:text-gray-400 sm:text-base dark:bg-gray-800 dark:border-gray-700 sm:p-4 sm:space-x-4 rtl:space-x-reverse">Step 4</button>
                </div>

                <form enctype="multipart/form-data" action="{{ route('santris.store') }}" method="post" class="p-4">
                    @csrf
                    <div class="mb-4">
                        <label for="nama" class="block text-lg font-medium text-gray-700">Nama</label>
                        <input value="{{ old('nama') }}" type="text" id="nama" name="nama" placeholder="Nama"
                            class="form-control w-full p-3 rounded-lg border @error('nama') border-red-500  @enderror">
                        @error('nama')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tempat_lahir" class="block text-lg font-medium text-gray-700">Tempat Lahir</label>
                        <input value="{{ old('tempat_lahir') }}" type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir"
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

                    <div class="mb-4">
                        <label for="nik" class="block text-lg font-medium text-gray-700">NIK</label>
                        <input value="{{ old('nik') }}" type="text" id="nik" name="nik" placeholder="NIK"
                            class="form-control w-full p-3 rounded-lg border @error('nik') border-red-500  @enderror">
                        @error('nik')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="kk" class="block text-lg font-medium text-gray-700">KK</label>
                        <input value="{{ old('kk') }}" type="text" id="kk" name="kk" placeholder="KK"
                            class="form-control w-full p-3 rounded-lg border @error('kk') border-red-500  @enderror">
                        @error('kk')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nama_kk" class="block text-lg font-medium text-gray-700">Nama Kepala Keluarga</label>
                        <input value="{{ old('nama_kk') }}" type="text" id="nama_kk" name="nama_kk" placeholder="Nama KK"
                            class="form-control w-full p-3 rounded-lg border @error('nama_kk') border-red-500  @enderror">
                        @error('nama_kk')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nisn" class="block text-lg font-medium text-gray-700">NISN</label>
                        <input value="{{ old('nisn') }}" type="text" id="nisn" name="nisn" placeholder="NISN"
                            class="form-control w-full p-3 rounded-lg border @error('nisn') border-red-500  @enderror">
                        @error('nisn')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nis" class="block text-lg font-medium text-gray-700">NIS</label>
                        <input value="{{ old('nis') }}" type="text" id="nis" name="nis" placeholder="NIS"
                            class="form-control w-full p-3 rounded-lg border @error('nis') border-red-500  @enderror">
                        @error('nis')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tk" class="block text-lg font-medium text-gray-700">TK</label>
                        <input value="{{ old('tk') }}" type="text" id="tk" name="tk" placeholder="TK"
                            class="form-control w-full p-3 rounded-lg border @error('tk') border-red-500  @enderror">
                        @error('tk')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="paud" class="block text-lg font-medium text-gray-700">PAUD</label>
                        <input value="{{ old('paud') }}" type="text" id="paud" name="paud" placeholder="PAUD"
                            class="form-control w-full p-3 rounded-lg border @error('paud') border-red-500  @enderror">
                        @error('paud')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="hobi" class="block text-lg font-medium text-gray-700">Hobi</label>
                        <input value="{{ old('hobi') }}" type="text" id="hobi" name="hobi" placeholder="Hobi"
                            class="form-control w-full p-3 rounded-lg border @error('hobi') border-red-500  @enderror">
                        @error('hobi')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="cita_cita" class="block text-lg font-medium text-gray-700">Cita-cita</label>
                        <input value="{{ old('cita_cita') }}" type="text" id="cita_cita" name="cita_cita" placeholder="Cita-cita"
                            class="form-control w-full p-3 rounded-lg border @error('cita_cita') border-red-500  @enderror">
                        @error('cita_cita')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-4">
                        <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-500">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
          <p>Ponpes Syafa'aturrasul Kuantan Singingi 2025</p>
        </div>
      </footer></body>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.5.4/dist/flowbite.bundle.min.js"></script>
</html>
