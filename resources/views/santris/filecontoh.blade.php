<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <script>
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

                fetch('{{ route("form.submit") }}', {
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
    </script>
</head>
<body>
    <h1>Form Validation</h1>
    <form id="myForm" onsubmit="validateForm(event)" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name">
            <span id="nameError" style="color: red;"></span>
        </div>
        <br>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <span id="emailError" style="color: red;"></span>
        </div>
        <br>
        <div>
            <label for="image">Upload Gambar (Maksimal 2MB, JPG/JPEG/PNG):</label>
            <input type="file" id="image" name="image" accept="image/jpeg, image/png">
            <span id="imageError" style="color: red;"></span>
        </div>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
