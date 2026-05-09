<h1>Carrito</h1>

@foreach($cart as $id => $item)
    <p>
        {{ $item['name'] }} -
        ${{ $item['price'] }} -
        Cantidad: {{ $item['quantity'] }}
    </p>
@endforeach

<a href="/cart/clear">Vaciar carrito</a>