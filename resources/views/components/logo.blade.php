@php
    if (request()->is(['login', 'register', 'forgot-password'])) {
        $class='mx-auto h-40 w-auto';
    } else {
        $class='h-20 w-auto';
    }
@endphp

<a href="/">
    <img class="{{ $class }}" src="{{ asset('storage/InternetSpeedReportLogo.png') }}"
                       alt="Internet Speed Report Logo" />
</a>
