<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f6f9;
            padding:40px;
        }

        .container{
            max-width:900px;
            margin:auto;
            background:white;
            padding:30px;
            border-radius:15px;
            box-shadow:0 5px 20px rgba(0,0,0,.1);
        }

        h1{
            margin-bottom:20px;
            color:#333;
        }

        .top-links{
            display:flex;
            gap:15px;
            margin-bottom:25px;
        }

        a{
            text-decoration:none;
            color:white;
            background:#3498db;
            padding:10px 15px;
            border-radius:8px;
            transition:.3s;
        }

        a:hover{
            background:#2980b9;
        }

        .item{
            border:1px solid #ddd;
            padding:20px;
            border-radius:10px;
            margin-bottom:20px;
            background:#fafafa;
        }

        .item h3{
            margin:0 0 10px;
        }

        .delete-btn{
            background:#e74c3c;
        }

        .delete-btn:hover{
            background:#c0392b;
        }

        .total{
            font-size:24px;
            margin:20px 0;
            color:#2c3e50;
        }

        .clear-btn{
            background:#f39c12;
        }

        .clear-btn:hover{
            background:#d68910;
        }

        button{
            background:#27ae60;
            color:white;
            border:none;
            padding:12px 20px;
            border-radius:8px;
            cursor:pointer;
            font-size:16px;
            transition:.3s;
        }

        button:hover{
            background:#1e8449;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>🛒 Carrito</h1>

    <div class="top-links">
        <a href="/products">Seguir comprando</a>
    </div>

    @php $total = 0; @endphp

    @foreach ($cart as $id => $item)

        <div class="item">
            <h3>{{ $item['name'] }}</h3>

            <p><strong>Precio:</strong> ${{ $item['price'] }}</p>

            <p><strong>Cantidad:</strong> {{ $item['quantity'] }}</p>

            @php $total += $item['price'] * $item['quantity']; @endphp

            <a class="delete-btn" href="/cart/remove/{{ $id }}">
                Eliminar
            </a>
        </div>

    @endforeach

    <hr>

    <h2 class="total">
        Total: ${{ $total }}
    </h2>

    <div class="top-links">
        <a class="clear-btn" href="/cart/clear">
            Vaciar carrito
        </a>
    </div>

    <form action="{{ route('paypal.pay') }}" method="POST">
        @csrf

        <button type="submit">
            Pagar con PayPal
        </button>
    </form>

</div>

</body>
</html>