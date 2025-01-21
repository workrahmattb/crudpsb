<!doctype html>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Ulang PPSR</title>
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
        <div class="container mx-auto flex flex-col items-center justify-center text-center py-20 px-6">
          <h1 class="text-4xl md:text-6xl font-bold mb-6">Welcome to <br/> Pondok Pesantren Syafa'aturrasul</h1>
          <p class="text-lg md:text-xl mb-8">Daftar Santri/wati Pendaftar Tahun Ajaran 2025/2026</p>

        </div>
      </section>

      <div class="container mx-auto my-4">

        <div class="container mx-auto mt-4">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            NISN
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NAMA
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ASAL SEKOLAH
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jenjang Pendidikan Didaftarkan
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @if ($pendaftarans->isNotEmpty())
                    @foreach ($pendaftarans as $pendaftaran)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $pendaftaran->alamat }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $pendaftaran->nama }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pendaftaran->sekolahasal }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pendaftaran->jenjangpendidikan }}
                        </td>

                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

        </div>
        {{ $pendaftarans->links() }}
    </div>


    </div>

    <footer class="bg-green-500 text-white py-6">
        <div class="container mx-auto text-center">
          <p>Ponpes Syafa'aturrasul Kuantan Singingi 2025</p>
        </div>
      </footer></body>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.5.4/dist/flowbite.bundle.min.js"></script>
</html>
