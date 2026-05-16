<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pago cancelado</title>

    <style>
        body{
            font-family:Arial,sans-serif;
            background:#f4f6f9;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .cancel-box{
            background:white;
            padding:50px;
            border-radius:15px;
            text-align:center;
            box-shadow:0 5px 20px rgba(0,0,0,.1);
            width:400px;
        }

        h2{
            color:#e74c3c;
            margin-bottom:20px;
        }

        p{
            color:#555;
            margin-bottom:10px;
        }

        button{
            margin-top:20px;
            background:#3498db;
            color:white;
            border:none;
            padding:12px 20px;
            border-radius:8px;
            cursor:pointer;
            font-size:16px;
        }

        button:hover{
            background:#2980b9;
        }
    </style>
</head>
<body>

<div class="cancel-box">

    <h2>❌ Pago cancelado</h2>

    <p>El pago fue cancelado.</p>

    <p>Puedes intentarlo nuevamente cuando quieras.</p>

    <button onclick="window.location.href='/cart'">
        Volver al carrito
    </button>

</div>

</body>
</html>