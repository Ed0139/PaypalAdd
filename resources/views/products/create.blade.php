<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear producto</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 40px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .1);
        }

        h1 {
            margin-bottom: 25px;
            color: #333;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
            height: 120px;
        }

        button {
            background: #27ae60;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #1e8449;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>➕ Crear producto</h1>

        <form method="POST" action="/products">

            @csrf

            <input type="text" name="name" placeholder="Nombre">

            <textarea name="description" placeholder="Descripción"></textarea>

            <input type="number" step="0.01" name="price" placeholder="Precio">

            <input type="number" name="stock" placeholder="Stock">

            <input type="text" name="image" placeholder="URL imagen">

            <button type="submit">
                Guardar
            </button>

        </form>

    </div>

</body>

</html>
