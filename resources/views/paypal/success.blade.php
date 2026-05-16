<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pago exitoso</title>

    <style>
        body{
            font-family:Arial,sans-serif;
            background:#f4f6f9;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .success-box{
            background:white;
            padding:50px;
            border-radius:15px;
            text-align:center;
            box-shadow:0 5px 20px rgba(0,0,0,.1);
            width:400px;
        }

        h2{
            color:#27ae60;
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

<div class="success-box">

    <h2>✅ Pago Exitoso</h2>

    <p>Tu pago fue procesado correctamente.</p>

    <p>Gracias por tu compra.</p>

    <button onclick="window.location.href='/'">
        Seguir comprando
    </button>

</div>

</body>
</html>