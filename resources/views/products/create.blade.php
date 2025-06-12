<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <x-app-layout>
        <h2 class="text-2xl font-bold mb-4">Tambah Produk</h2>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nama Produk" required><br>
        <input type="number" name="stock" placeholder="Stok" required><br>
        <input type="number" name="price" placeholder="harga" required><br>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
    </x-app-layout>
</body>
</html>