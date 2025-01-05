<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title ?? 'Internet Speed Report'}}</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
    <header class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <h1 class="text-center text-4xl ubuntu-regular pt-5">
          <a href="{{url('/')}}" class="drop-shadow-2xl text-gray-900 hover:text-gray-900">
            Internet Speed Report
          </a>
       </h1>
       <x-navigation />
       <x-button :route="'run-speedtest'"> SpeedTest Run </x-button>
       <x-environment-error />
    </header>
    <main>
        {{$slot}}
    </main>
    <footer class="mt-5 mx-auto max-w-7xl sm:px-6 lg:px-8">
        @if(session('success'))
             <x-alert type="success" message="{{session('success')}}" />
        @endif
        @if(session('error'))
            <x-alert type="error" message="{{session('error')}}" />
        @endif
        <x-footer />
    </footer>
</body>
</html>
