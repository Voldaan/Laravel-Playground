<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Displacement</th>
            <th>Engine type</th>
        </thead>
        <tbody>
            @foreach ($engines as $engine)
                <tr>
                    <td>{{ $engine['id'] }}</td>
                    <td>{{ $engine['name'] }}</td>
                    <td>{{ $engine['displacement'] }}</td>
                    <td>{{ $engine['engine_type'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>