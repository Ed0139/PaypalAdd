<!DOCTYPE html>
<html>
<head>
    <title>Crear producto</title>
</head>
<body>

<h1>Crear producto</h1>

<form method="POST" action="/products">
    @csrf

    <input type="text" name="name" placeholder="Nombre"><br><br>

    <textarea name="description" placeholder="Descripción"></textarea><br><br>

    <input type="number" step="0.01" name="price" placeholder="Precio"><br><br>

    <input type="number" name="stock" placeholder="Stock"><br><br>

    <input type="text" name="image" placeholder="URL imagen"><br><br>

    <button type="submit">Guardar</button>
</form>

</body>
</html>