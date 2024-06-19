<!DOCTYPE html>
<html>
<head>
    <title>Detalle de PQR</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .section-title {
            font-size: 1.2em;
            margin-bottom: 10px;
            color: #555;
        }
        .section-content {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .section-content p {
            margin: 5px 0;
            color: #333;
        }
        .no-record {
            text-align: center;
            color: #e74c3c;
        }
    </style>
</head>
<body>
    <div class="container">
        @if(isset($pqr))
            <h1>Detalle de PQR</h1>
            <div class="section-content">
                <p><span class="section-title">ID:</span> {{ $pqr->id }}</p>
                <p><span class="section-title">Tipo:</span> {{ $pqr->tipo }}</p>
                <p><span class="section-title">Estado:</span> {{ $pqr->estado }}</p>
                <p><span class="section-title">Email:</span> {{ $pqr->email }}</p>
                <p><span class="section-title">Nombre:</span> {{ $pqr->nombre }}</p>
                <p><span class="section-title">Descripción:</span> {{ $pqr->descripcion }}</p>
                <p><span class="section-title">Respuesta:</span> {{ $pqr->respuesta }}</p>
                <!-- Agrega más campos según los atributos de tu modelo PQR -->
            </div>
        @else
            <p class="no-record">No se encontró la PQR especificada.</p>
        @endif
    </div>
</body>
</html>
