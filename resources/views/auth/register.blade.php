<x-layout>
    <div class="flex min-h-full items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
      <div class="w-full max-w-sm space-y-2">
        <div>
          <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900 ubuntu-regular">Register</h2>
        </div>
        <form method="POST" class="space-y-6" action="{{route('register.store')}}">
          @csrf
          <div>
            <x-inputs.text id="name" name="name" type="name" ariaLabel="name" divClass="col-span-2" roundedDirection="rounded-t-md" placeholder="Your Name" />
            <x-inputs.text id="email" name="email" type="email" autocomplete="email" ariaLabel="Email address" placeholder="Your email" divClass="col-span-2"/>
            <x-inputs.text id="password" name="password" type="password" ariaLabel="Password" placeholder="Your password" divClass="-mt-px"/>
            <x-inputs.text id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm password" divClass="-mt-px" roundedDirection="rounded-b-md"/>
          </div>

          <div class="flex items-center justify-between">
            <div class="flex gap-3">
              <div class="flex h-6 shrink-0 items-center">
                <div class="group grid size-4 grid-cols-1">
                </div>
              </div>
            </div>

            <div class="text-sm/6">
              <a href="{{route('login')}}" class="text-sm ubuntu-medium drop-shadow-2xl">Already have an account?</a>
            </div>
          </div>

          <div>
            <button type="submit"
                    class="flex w-full justify-center rounded-lg bg-blue-500 px-3 py-1.5 text-sm/6 ubuntu-medium text-white hover:bg-orange-500 text-sm">
                    Register
            </button>
          </div>
        </form>
      </div>
    </div>
  </x-layout>
