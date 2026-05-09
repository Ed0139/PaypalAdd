<!DOCTYPE html>
<html>
<head>
    <title>Productos</title>
</head>
<body>

<h1>Lista de productos</h1>
<a href="/cart">Ver carrito</a>

<a href="/products/create">Crear producto</a>

<hr>

@foreach($products as $product)
    <div style="border:1px solid #ccc; margin:10px; padding:10px;">
        <h3>{{ $product->name }}</h3>
        <p>{{ $product->description }}</p>
        <p>Precio: ${{ $product->price }}</p>
        <p>Stock: {{ $product->stock }}</p>

        @if($product->image)
            <img src="{{ $product->image }}" width="100">
        @endif

        <br>

        <a href="/cart/add/{{ $product->id }}">Agregar al carrito</a>

        <form action="/products/{{ $product->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Eliminar</button>
        </form>
    </div>
@endforeach

</body>
</html>