<x-layout :title={{ $title }}>
    <div class="flex min-h-full flex-col justify-center py-6 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
          <x-logo />
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-[480px]">
          <div class="bg-white px-6 py-12 shadow-xl sm:rounded-lg sm:px-12">
            <x-headings.form-headings>Login</x-headings.form-headings>
            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif
            <form class="space-y-6" action="/forgot-password" method="POST">
              @csrf
              <x-inputs.text label="Email address" id="email" name="email" type="email"  />
              <x-auth-button>Request Reset Link</x-auth-button>
            </form>
          </div>
        </div>
      </div>
</x-layout>
