<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Chat IA Laravel</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: auto;
            padding: 20px;
            background: #f5f5f5;
        }

        h1 {
            text-align: center;
        }

        #chat {
            border: 1px solid #ccc;
            background: white;
            height: 500px;
            overflow-y: auto;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .usuario {
            background: #d9edf7;
            padding: 10px;
            margin: 10px;
            border-radius: 10px;
        }

        .ia {
            background: #dff0d8;
            padding: 10px;
            margin: 10px;
            border-radius: 10px;
        }

        .error {
            background: #f2dede;
            padding: 10px;
            margin: 10px;
            border-radius: 10px;
            color: #a94442;
        }

        input {
            width: 78%;
            padding: 12px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            padding: 12px;
            border: none;
            background: #007bff;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }
    </style>

</head>

<body>

    <h1>Chat con IA usando Laravel y OpenAI</h1>

    <div id="chat"></div>

    <input type="text" id="pregunta" placeholder="Escribe una pregunta">

    <button onclick="enviar()">
        Enviar
    </button>

    <script>
        let mensajes = [

            {
                role: "system",
                content: "Eres un asistente amable especializado en Laravel, programación web, bases de datos y desarrollo de software."
            }

        ];

        function enviar() {
            let pregunta =
                document.getElementById("pregunta").value;

            if (pregunta.trim() === "") {
                return;
            }

            document.getElementById("chat").innerHTML +=

                `<div class="usuario">
<strong>Usuario:</strong><br>
${pregunta}
</div>`;

            mensajes.push({
                role: "user",
                content: pregunta
            });

            document.getElementById("pregunta").value = "";

            document.getElementById("chat").scrollTop =
                document.getElementById("chat").scrollHeight;

            fetch('/preguntar', {
                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json',

                        'X-CSRF-TOKEN': document.querySelector(
                            'meta[name="csrf-token"]'
                        ).content
                    },

                    body: JSON.stringify({
                        mensajes: mensajes
                    })
                })

                .then(response => {

                    if (!response.ok) {
                        throw new Error(
                            'Error HTTP: ' + response.status
                        );
                    }

                    return response.json();

                })

                .then(data => {

                    console.log(data);

                    if (data.error) {
                        document.getElementById("chat").innerHTML +=

                            `<div class="error">
<strong>Error:</strong><br>
${data.error}
</div>`;

                        return;
                    }

                    document.getElementById("chat").innerHTML +=

                        `<div class="ia">
<strong>IA:</strong><br>
${data.respuesta}
</div>`;

                    mensajes.push({
                        role: "assistant",
                        content: data.respuesta
                    });

                    document.getElementById("chat").scrollTop =
                        document.getElementById("chat").scrollHeight;

                })

                .catch(error => {

                    console.error(error);

                    document.getElementById("chat").innerHTML +=

                        `<div class="error">
<strong>Error:</strong><br>
${error.message}
</div>`;

                });
        }

        document.getElementById("pregunta")
            .addEventListener("keypress",
                function(event) {
                    if (event.key === "Enter") {
                        enviar();
                    }
                });
    </script>

</body>

</html>
