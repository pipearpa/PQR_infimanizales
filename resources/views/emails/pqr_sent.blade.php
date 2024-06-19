<!DOCTYPE html>
<html>
<head>
    <title>Nueva PQR enviada</title>
</head>
<body>
    <h2>Señor@ {{ $pqr->nombre }} se ha generado una nueva PQR con numero de radicado <b>{{ $pqr->id }}</b>,
        podrá consultar el estado del proceso de esta misma con los siguientes datos en la seccion de
        consultar PQR.
        <br>
        <br>
        <b>NUMERO DE SOLICITUD : {{ $pqr->id }} </b> <br>
        <b>NUMERO DE DOCUMENTO : {{ $pqr->numero_documento }} </b> <br>
    </h2>

    <p>Detalles de la PQR:</p>
    <ul>
        <li>ID: {{ $pqr->id }}</li>
        <br>
        <li>Nombre del solicitante: {{ $pqr->nombre }}</li>
        <li>Numero Documento: {{ $pqr->numero_documento }}</li>
        <li>Email: {{ $pqr->email }}</li>
        <br>
        <li>Tipo: {{ $pqr->tipo }}</li>
        <li>Medio de respuesta: {{ $pqr->respuesta }}</li>
        <li>Descripción: {{ $pqr->descripcion }}</li>
        <li>Fecha Creacion: {{ $pqr->created_at }}</li>

    </ul>
</body>
</html>
