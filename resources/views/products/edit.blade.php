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
        <h2 class="text-2xl font-bold mb-4">Edit Produk</h2>
        <form action="{{ route('products.update', $product) }}" method="POST">
            @csrf @method('PUT')

            <input type="text" name="name" value="{{ $product->name }}" required><br>
            <input type="number" name="stock" value="{{ $product->stock }}" required><br>
            <input type="number" name="price" value="{{ $product->price }}" required><br>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </x-app-layout>
</body>
</html>