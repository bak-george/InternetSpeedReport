<x-layout>
  <div class="flex min-h-full items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
    <div class="w-full max-w-sm space-y-10">
      <div>
        <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900 ubuntu-regular">Internet Speed Report</h2>
      </div>
      <form class="space-y-6" action="{{route('login.authenticate')}}" method="POST">
        @csrf
        <div>
          <x-inputs.text id="email" name="email" type="email" autocomplete="email" ariaLabel="Email address" placeholder="Your email" divClass="col-span-2" roundedDirection="rounded-t-md"/>
          <x-inputs.text id="password" name="password" type="password" ariaLabel="Password" placeholder="Your password" divClass="-mt-px" roundedDirection="rounded-b-md"/>
        </div>

        <div class="flex items-center justify-between">
          <div class="flex gap-3">
            <div class="flex h-6 shrink-0 items-center">
              <div class="group grid size-4 grid-cols-1">
                <input id="remember-me" name="remember-me" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                  <path class="opacity-0 group-has-[:checked]:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path class="opacity-0 group-has-[:indeterminate]:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
            </div>
            <label for="remember-me" class="block text-sm/6 text-gray-900">Remember me</label>
          </div>

          <div class="text-sm/6">
            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500 ubuntu-regular">Forgot password?</a>
          </div>
        </div>

        <div>
          <button type="submit"
                  class="flex w-full justify-center rounded-lg bg-blue-500 px-3 py-1.5 text-sm/6 ubuntu-medium text-white hover:bg-orange-500 text-sm">
                  Sign in
          </button>
        </div>
      </form>
    </div>
  </div>
</x-layout>
