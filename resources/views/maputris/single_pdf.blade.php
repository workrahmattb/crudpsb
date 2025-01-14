<!DOCTYPE html>
<html>
<head>
    <title>Detail Santri</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            padding: 20px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Santri</h1>
        <p><strong>Nama:</strong> {{ $santri->nama }}</p>
        <p><strong>Alamat:</strong> {{ $santri->nama_ayah }}</p>
        <p><strong>Nomor Telepon:</strong> {{ $santri->nama_ibu }}</p>
        <p><strong>Email:</strong> {{ $santri->alamat }}</p>
        <p><strong>Tanggal Lahir:</strong> {{ $santri->tanggal_lahir }}</p>
    </div>
</body>
</html>
