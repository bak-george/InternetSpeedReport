<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title ?? 'Internet Speed Report'}}</title>
    @vite('resources/css/app.css')
    <!-- Meta description -->
    <meta name="description" content="">
</head>
<body class="font-vt323 ">
    <header>

    </header>
    <main>
        {{$slot}}
    </main>
    <footer>

    </footer>
</body>
</html>
