<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Ponpes Syafa'aturrasul</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
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
        <div class="container mx-auto flex flex-col items-center justify-center text-center py-20 px-6">
          <h1 class="text-4xl md:text-6xl font-bold mb-6">Welcome to <br/> Pondok Pesantren Syafa'aturrasul</h1>
          <p class="text-lg md:text-xl mb-8">We provide the best solutions for your business needs.</p>

      </section>

    <div class="container mx-auto p-4">
        <div class="flex justify-end mb-4">
            <a href="{{ route('mtsputris.create') }}" class="bg-gradient-to-r from-teal-400 to-teal-600 text-white font-semibold py-3 px-6 rounded-lg shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-teal-300" hover:bg-gray-700">Create</a>
        </div>
        @if (Session::has('success'))
        <div class="mb-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                {{ Session::get('success') }}
            </div>
        </div>
        @endif
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="bg-green-800 p-6">
                <h3 class="text-white text-2xl font-semibold">Nama Santri Pondok Pesantren Syafa'aturrasuls</h3>
            </div>
            <div class="relative overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-600 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-800 dark:text-gray-400">
                        <tr>
                            <th class="border px-4 py-3">NISN</th>
                            <th class="border px-4 py-3">Nama</th>
                            <th class="border px-4 py-3">Alamat</th>
                            <th class="border px-4 py-3">Tanggal Lahir</th>
                            <th class="border px-4 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($mtsputris->isNotEmpty())
                            @foreach ($mtsputris as $student)
                                <tr class="hover:bg-gray-50 transition-all duration-200">
                                    <td class="border px-4 py-3">{{ $student->nisn }}</td>
                                    <td class="border px-4 py-3">{{ $student->nama }}</td>
                                    <!-- <td class="border px-4 py-3">
                                        @if ($student->photo != "")
                                            <img class="w-16 h-16 object-cover rounded-md" src="{{ asset('storage/' . $student->photo) }}" alt="">
                                        @endif
                                    </td> -->
                                    <td class="border px-4 py-3">{{ $student->desa }}, Kec.{{ $student->kecamatan }}, Kab.{{ $student->kabupaten }}, Prov.{{ $student->provinsi }}</td>
                                    <td class="border px-4 py-3">{{ \Carbon\Carbon::parse($student->tanggal_lahir)->format('d M, Y') }}</td>
                                    <td class="border px-4 py-3 text-center">
                                        <div class="flex space-x-2 justify-center">
                                            <a href="{{ route('mtsputris.edit', $student->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-500 transition-all duration-200">Edit</a>
                                            <a href="#" onclick="deleteSantri({{ $student->id }});" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-500 transition-all duration-200">Delete</a>
                                        </div>
                                        <form id="delete-santri-form-{{ $student->id }}" action="{{ route('mtsputris.destroy', $student->id) }}" method="post" class="hidden">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        @endif

                    </tbody>

                </table>

            </div>
            {{ $mtsputris->links() }}
        </div>
    </div>
    <script>
        function deleteSantri(id) {
            if (confirm("Are you sure you want to delete this santri?")) {
                document.getElementById("delete-santri-form-" + id).submit();
            }
        }
    </script>

    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
        <p>Ponpes Syafa'aturrasul Kuantan Singingi 2025</p>
        </div>
    </footer>
  </body>
</html>
