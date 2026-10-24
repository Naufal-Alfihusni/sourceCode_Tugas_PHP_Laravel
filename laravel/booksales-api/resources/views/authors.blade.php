<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Halaman author buku</h1>
    @foreach ($authors as $item)
        <ul>
            <li>{{ $item['name'] }}</li>
            <li>{{ $item['photo'] }}</li>
            <li>{{ $item['bio'] }}</li>
        </ul>
    @endforeach
</body>
</html>