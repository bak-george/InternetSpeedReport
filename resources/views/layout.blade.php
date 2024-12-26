<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title ?? 'Internet Speed Report'}}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-frenchGray">
    <header>
       <h1 class="text-center text-4xl ubuntu-regular pt-5">
            Internet Test Speed
       </h1>
    </header>
    <main>
        {{$slot}}
    </main>
    <footer>

    </footer>
</body>
</html>
