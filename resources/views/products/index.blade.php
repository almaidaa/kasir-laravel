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
        <h2 class="text-2xl font-bold mb-4">Daftar Produk</h2>

    <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Produk</a>

    @if(@session('success'))
    <div class="bg-green-100 p-2 rounded mb-2">{{ session('succsess') }}</div>
    @endif

    <table class="table-auto w-full border">
        <thead>
            <tr>
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Stock</th>
                <th class="border px-4 py-2">Harga</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td class="border px-4 py-2">{{ $product->name }}</td>
                    <td class="border px-4 py-2">{{ $product->stock }}</td>
                    <td class="border px-4 py-2">{{ number_format($product->price, 0, ',', '.') }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('products.edit', $product) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Yakin')" class="text-red-500 ml-2">Hapus</button>
                        </form>
                    </td>
                </tr>   
                @endforeach
            </tbody>
        </thead>
    </table>
    <div class="mt-4"> {{ $products->links() }} </div>
    </x-app-layout>
</body>
</html>