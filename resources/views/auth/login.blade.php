<x-layout :title={{ $title }}>
    <div class="flex min-h-full flex-col justify-center py-6 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
          <x-logo />
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-[480px]">
          <div class="bg-white px-6 py-12 shadow-xl sm:rounded-lg sm:px-12">
            <x-headings.form-headings>Login</x-headings.form-headings>
            <form class="space-y-6" action="{{ route('login') }}" method="POST">
              @csrf
              <x-inputs.text label="Email address" id="email" name="email" type="email"  />
              <x-inputs.text label="Password" id="password" name="password" type="password"  />
              <div class="flex items-center justify-between">
                <div class="flex gap-3">
                  <div class="flex h-6 shrink-0 items-center">
                    <div class="group grid size-4 grid-cols-1">
                      <input id="remember-me" name="remember" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded border border-gray-300 bg-white checked:border-purple checked:bg-purple indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                      <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                        <path class="opacity-0 group-has-[:checked]:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                    </div>
                  </div>
                  <label for="remember-me" class="block text-sm/6 text-blackNight">Remember me</label>
                </div>

                <div class="text-sm/6">
                  <a href="/forgot-password" class="font-semibold text-orangeRed hover:text-purple">Forgot password?</a>
                </div>
              </div>
              <x-auth-button>Login</x-auth-button>
            </form>
          </div>
          <x-auth-switch-link />
        </div>
      </div>
</x-layout>
