<!DOCTYPE html>
<html lang="en" class="{{ request()->is(['register', 'login', 'forgot-password']) ? 'h-full bg-ashGray' : '' }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title ?? 'Internet Speed Report'}}</title>

    @vite('resources/css/app.css')
</head>
@if (request()->is(['register', 'login', 'forgot-password']))
<body class="{{ request()->is('register') ? 'h-full bg-ashGray' : '' }}">
    <main>
        {{$slot}}
        @if(session('success'))
        <x-alert type="success" message="{{session('success')}}" />
        @endif
        @if(session('error'))
        <x-alert type="error" message="{{session('error')}}" />
        @endif
    </main>
</body>
@else
<body class="bg-ashGray">
    <header>
      <x-navigation :user="Illuminate\Support\Facades\Auth::user()"/>
        <x-environment-error />
      </div>
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
@endif

</html>
