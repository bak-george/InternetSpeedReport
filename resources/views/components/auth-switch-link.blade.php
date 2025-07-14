<p class="mt-10 text-center text-sm/6 text-blackNight">
    @if (request()->is('register'))
        Do you have an account?
        <a href="/login" class="font-semibold text-orangeRed hover:text-purple">Login</a>
    @elseif (request()->is('login'))
        Don't have an account?
        <a href="/register" class="font-semibold text-orangeRed hover:text-purple">Register</a>
    @endif
</p>
