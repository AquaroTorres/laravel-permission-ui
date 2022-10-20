<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permissions index</title>
</head>
<body>
    <h1>Permissions index</h1>

    @foreach($permissions as $permission)
        <li>{{ $permission->name }}</li>
    @endforeach
</body>
</html>