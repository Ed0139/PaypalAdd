<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Productos</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 40px;
        }

        .header {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
        }

        .btn {
            text-decoration: none;
            background: #3498db;
            color: white;
            padding: 10px 15px;
            border-radius: 8px;
            transition: .3s;
        }

        .btn:hover {
            background: #2980b9;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, .1);
            padding: 20px;

            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }

        .card h3 {
            margin-top: 15px;
            min-height: 40px;
        }

        .price {
            color: #27ae60;
            font-size: 20px;
            font-weight: bold;
        }

        .stock {
            color: #555;
        }

        .actions {
            margin-top: 15px;
            display: flex;
            gap: 10px;
        }

        .add-btn {
            background: #27ae60;
        }

        .add-btn:hover {
            background: #1e8449;
        }

        .delete-btn {
            background: #e74c3c;
            border: none;
            color: white;
            padding: 10px 15px;
            border-radius: 8px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background: #c0392b;
        }
    </style>
</head>

<body>

    <h1>🛍 Lista de productos</h1>

    <div class="header">

        <a class="btn" href="/cart">
            Ver carrito
        </a>

        <a class="btn" href="/products/create">
            Crear producto
        </a>

        <a class="btn" href="/login">
            Iniciar sesión
        </a>

    </div>

    <div class="products">

        @foreach ($products as $product)
            <div class="card">

                @if ($product->image)
                    <img src="{{ $product->image }}">
                @endif

                <h3>{{ $product->name }}</h3>

                <p>{{ $product->description }}</p>

                <p class="price">
                    ${{ $product->price }}
                </p>

                <p class="stock">
                    Stock: {{ $product->stock }}
                </p>

                <div class="actions">

                    <a class="btn add-btn" href="/cart/add/{{ $product->id }}">
                        Agregar
                    </a>

                    <form action="/products/{{ $product->id }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button class="delete-btn">
                            Eliminar
                        </button>

                    </form>

                </div>

            </div>
        @endforeach

    </div>

</body>

</html>
