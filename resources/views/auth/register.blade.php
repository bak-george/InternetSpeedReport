<x-layout>
    <div class="flex min-h-full flex-col justify-center py-6 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
          <x-logo />
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-[480px]">
          <div class="bg-white px-6 py-12 shadow-xl sm:rounded-lg sm:px-12">
            <x-headings.form-headings>Register</x-headings.form-headings>
            <form class="space-y-6" action="{{ route('register') }}" method="POST">
              @csrf
              <x-inputs.text label="Username" id="name" name="name"  />
              <x-inputs.text label="Email address" id="email" name="email" type="email"  />
              <x-inputs.text label="Password" id="password" name="password" type="password"  />
              <x-inputs.text label="Verify Password" id="password_confirmation" name="password_confirmation" type="password" />
              <x-auth-button>Register</x-auth-button>
            </form>
          </div>
          <x-auth-switch-link />
        </div>
      </div>
</x-layout>
