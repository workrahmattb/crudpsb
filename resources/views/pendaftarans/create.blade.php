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
            .slide {
                    display: none;
                }
            .slide.active {
                    display: block;
                }
            .error-message {
                    color: red;
                    font-size: 12px;
                }
        </style>

        {{-- ini javascrpit lama --}}
        {{-- <script>
            // Validasi sisi klien menggunakan JavaScript
            function validateForm(event) {
                event.preventDefault();

                let name = document.getElementById('name').value.trim();
                let email = document.getElementById('email').value.trim();
                let image = document.getElementById('image').files[0];
                let error = false;

                // Reset pesan error
                document.getElementById('nameError').innerText = '';
                document.getElementById('emailError').innerText = '';
                document.getElementById('imageError').innerText = '';

                // Validasi nama
                if (!name) {
                    document.getElementById('nameError').innerText = 'Nama harus diisi.';
                    error = true;
                }

                // Validasi email
                if (!email) {
                    document.getElementById('emailError').innerText = 'Email harus diisi.';
                    error = true;
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    document.getElementById('emailError').innerText = 'Format email tidak valid.';
                    error = true;
                }

                // Validasi gambar
                if (!image) {
                    document.getElementById('imageError').innerText = 'Gambar harus diisi.';
                    error = true;
                }
                if (image) {
                    const allowedTypes = ['image/jpeg', 'image/png'];
                    if (!allowedTypes.includes(image.type)) {
                        document.getElementById('imageError').innerText = 'Format gambar harus JPG, JPEG, atau PNG.';
                        error = true;
                    }
                    if (image.size > 2 * 1024 * 1024) { // 2MB
                        document.getElementById('imageError').innerText = 'Ukuran gambar maksimal 2MB.';
                        error = true;
                    }
                }

                // Jika tidak ada error, kirim form via AJAX
                if (!error) {
                    const formData = new FormData(document.getElementById('myForm'));

                    fetch('{{ route("daftars.store") }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert(data.message);
                            document.getElementById('myForm').reset();
                        }
                    })
                    .catch(error => console.error('Error:', error));
                }
            }
        </script> --}}
        {{-- end javascript lama --}}

    {{-- <style>
        img {
            max-width: 200px;
            margin-top: 10px;
            display: none;
        }
    </style> --}}


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
        {{-- @if (Session::has('error_message'))
                            <div class="mb-4">
                                <div class="bg-red-100 border border-red-400 text-black-700 px-4 py-3 rounded relative" role="alert">
                                    {{ Session::get('error_message') }}
                                </div>
                            </div>
                            @endif --}}
    <div class="flex justify-center">
        <div class="w-full max-w-2xl bg-white shadow-lg rounded-lg">
            <div class="bg-green-500 p-4 rounded-t-lg">
                <h3 class="text-white text-xl">Isi Data Daftar PSB</h3>
            </div>
                <form id="multiStepForm" enctype="multipart/form-data" class="p-4">
                    @csrf

                    <div class="slide" id="slide1">
                        {{-- NISN --}}
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



                        <div class="mb-4">
                            <label for="nama" class="block text-lg font-medium text-gray-700">Nama</label>
                            <input value="{{ old('nama') }}" type="text" id="nama" name="nama"
                                class="form-control w-full p-3 rounded-lg border @error('nama') border-red-500 @enderror">
                            @error('nama')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <button type="button" onclick="nextSlide(1)">Lanjut</button>
                        </div>
                    </div>


                    <!-- Slide 2: Email -->
                    <div class="slide" id="slide2" style="display: none;">
                        <label for="email">Email:</label>
                        <input type="text" id="email" name="email">
                        <span id="emailError" class="error-message"></span>
                        <button type="button" onclick="prevSlide(1)">Kembali</button>
                        <button type="button" onclick="nextSlide(2)">Lanjut</button>
                    </div>

                    <!-- Slide 3: Image -->
                    <div class="slide" id="slide3" style="display: none;">
                        <label for="image">Gambar:</label>
                        <input type="file" id="image" name="image">
                        <span id="imageError" class="error-message"></span>
                        <button type="button" onclick="prevSlide(2)">Kembali</button>
                        <button type="submit">Submit</button>
                    </div>
                </form>
        </div>
    </div>
    </div>





</body>
<script>
    let currentSlide = 1;

            function showSlide(slideIndex) {
                const slides = document.querySelectorAll('.slide');
                slides.forEach((slide, index) => {
                    slide.style.display = index + 1 === slideIndex ? 'block' : 'none';
                });
            }

            function validateSlide(slideIndex) {
                let isValid = true;

                // Reset error messages
                document.getElementById('nisnError').innerText = '';
                document.getElementById('namaError').innerText = '';
                document.getElementById('emailError').innerText = '';
                document.getElementById('imageError').innerText = '';

                if (slideIndex === 1) {
                    const nisn = document.getElementById('nisn').value.trim();
                    if (!name) {
                        document.getElementById('nisnError').innerText = 'Nama harus diisi.';
                        isValid = false;
                    }

                    const nama = document.getElementById('nama').value.trim();
                    if (!nama) {
                        document.getElementById('namaError').innerText = 'Nama ke 2 harus diisi.';
                        isValid = false;
                    }
                } else if (slideIndex === 2) {
                    const email = document.getElementById('email').value.trim();
                    if (!email) {
                        document.getElementById('emailError').innerText = 'Email harus diisi.';
                        isValid = false;
                    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                        document.getElementById('emailError').innerText = 'Format email tidak valid.';
                        isValid = false;
                    }
                } else if (slideIndex === 3) {
                    const image = document.getElementById('image').files[0];
                    if (!image) {
                        document.getElementById('imageError').innerText = 'Gambar harus diisi.';
                        isValid = false;
                    } else {
                        const allowedTypes = ['image/jpeg', 'image/png'];
                        if (!allowedTypes.includes(image.type)) {
                            document.getElementById('imageError').innerText = 'Format gambar harus JPG, JPEG, atau PNG.';
                            isValid = false;
                        }
                        if (image.size > 2 * 1024 * 1024) {
                            document.getElementById('imageError').innerText = 'Ukuran gambar maksimal 2MB.';
                            isValid = false;
                        }
                    }
                }

                return isValid;
            }

            function nextSlide(currentIndex) {
                if (validateSlide(currentIndex)) {
                    currentSlide++;
                    showSlide(currentSlide);
                }
            }

            function prevSlide(currentIndex) {
                currentSlide--;
                showSlide(currentSlide);
            }

            // Tampilkan slide pertama saat halaman dimuat
            showSlide(currentSlide);


</script>
</html>
