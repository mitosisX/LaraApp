<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bulma.min.css') }}">
    <title>Document</title>
</head>
<body>
    <p class="block"><a href="{{ route('upload.create') }}"><button class="button">Create</button></a></p>
    @foreach ($images as $image)
        <div class="notification">
            <figure class="image is-128x128">
                <img class="is-rounded" src="{{ asset($image->path) }}">
            </figure>
        </div>
    @endforeach
</body>
</html>