<x-layout>
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 mt-5">
        <div class="divide-y divide-white/5 space-y-6">
            <div class="grid max-w-7xl grid-cols-1 gap-x-8 gap-y-10 px-4 py-16 sm:px-6 md:grid-cols-3 lg:px-8 bg-white rounded-lg shadow-lg">
                <div>
                    <x-profile-form-heading>Personal Information</x-profile-form-heading>
                    <x-profile-form-sub-heading>Use a permanent address where you can receive mail.</x-profile-form-sub-heading>
                </div>

                <form method="POST" action="{{ route('user-profile-information.update') }}" class="md:col-span-2">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:max-w-xl sm:grid-cols-6">
                        <x-inputs.text colSpan='col-span-full' label="Username" id="name" name="name" value="{{ $user->name }}" />
                        <x-inputs.text colSpan='col-span-full' label="Email address" id="email" name="email" type="email" value="{{ $user->email }}" />
                    </div>

                    <div class="mt-8 flex">
                        <x-auth-button>Save</x-auth-button>
                    </div>
                </form>
            </div>

            <div class="grid max-w-7xl grid-cols-1 gap-x-8 gap-y-10 px-4 py-16 sm:px-6 md:grid-cols-3 lg:px-8 bg-white rounded-lg shadow-lg">
                <div>
                <x-profile-form-heading>Change password</x-profile-form-heading>
                <x-profile-form-sub-heading>Update your password associated with your account.</x-profile-form-sub-heading>
                </div>

                <form method="POST" action="{{ route('user-password.update') }}" class="md:col-span-2">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:max-w-xl sm:grid-cols-6">
                        <x-inputs.text colSpan='col-span-full' label="Current Password" id="current_password" name="current_password" type="password" />
                        <x-inputs.text colSpan='col-span-full' label="New Password" id="password" name="password" type="password" />
                        <x-inputs.text colSpan='col-span-full' label="Confirm New Password" id="password_confirmation" name="password_confirmation" type="password" />
                    </div>
                    <div class="mt-8 flex">
                        <x-auth-button>Save</x-auth-button>
                    </div>
                </form>
            </div>

            <div class="grid max-w-7xl grid-cols-1 gap-x-8 gap-y-10 px-4 py-16 sm:px-6 md:grid-cols-3 lg:px-8 bg-white rounded-lg shadow-lg">
                <div>
                <x-profile-form-heading>Delete account</x-profile-form-heading>
                <x-profile-form-sub-heading>No longer want to use our service? You can delete your account here. This action is not reversible. All information related to this account will be deleted permanently.</x-profile-form-sub-heading>
                </div>

                <form method="POST" action="{{ route('user.delete', auth()->user()) }}" class="flex items-start md:col-span-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="rounded-md bg-orangeRed px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-ashGray hover:text-blackNight">
                        Yes, delete my account
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-layout>
