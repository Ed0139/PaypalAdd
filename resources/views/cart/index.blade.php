<h1>Carrito</h1>
<a href="/products">Seguir comprando</a>

@php $total = 0; @endphp

@foreach($cart as $id => $item)
    <div>
        <h3>{{ $item['name'] }}</h3>
        <p>Precio: ${{ $item['price'] }}</p>
        <p>Cantidad: {{ $item['quantity'] }}</p>

        @php $total += $item['price'] * $item['quantity']; @endphp

        <a href="/cart/remove/{{ $id }}">Eliminar</a>
    </div>
@endforeach

<hr>

<h2>Total: ${{ $total }}</h2>

<a href="/cart/clear">Vaciar carrito</a>