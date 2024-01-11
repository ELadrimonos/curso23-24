<html>
<head>
    <title>Listado de libros</title>
</head>
<body>
<h1>Listado de libros</h1>
<table>
    <thead>
        <tr>
            <th>Título</th>
            <th>Autor</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($libros as $libro)
        <tr>
            <td>{{ $libro["titulo"] }}</td>
            <td>{{ $libro["autor"] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
