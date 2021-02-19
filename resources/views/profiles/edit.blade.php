<x-app-layout>
    <div class="w-full sm:max-w-xl px-6 py-4 bg-white border-b overflow-clip sm:rounded-xl">
        <form method="POST" action="{{ route('profiles.update', $user) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')"></x-auth-session-status>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors"></x-auth-validation-errors>

            {{-- Name --}}
            <div>
                <x-label for="name" :value="__('Name')"></x-label>
                <x-input id="name"
                         class="block mt-1 w-full"
                         type="text"
                         name="name"
                         :value="$user->name"
                         autofocus></x-input>
            </div>

            {{-- Email --}}
            <div class="mt-4">
                <x-label for="email" :value="__('Email')"></x-label>
                <x-input id="email"
                         class="block mt-1 w-full"
                         type="email"
                         name="email"
                         :value="$user->email"></x-input>
            </div>

            {{-- Username --}}
            <div class="mt-4">
                <x-label for="username" :value="__('Username')"></x-label>
                <x-input id="username"
                         class="block mt-1 w-full"
                         type="text"
                         name="username"
                         :value="$user->username"></x-input>
            </div>

            {{-- Avatar --}}
            <div class="mt-4 flex items-end justify-between">
                <div>
                    <x-label for="avatar" :value="__('Avatar')"></x-label>
                    <input id="avatar"
                           class="block mt-2"
                           type="file"
                           name="avatar"/>
                </div>
                <img src="{{ $user->avatar }}" class="rounded-full" style="width: 50px; height: 50px; object-fit: cover" alt="current avatar">
            </div>

            {{-- Password --}}
            <div class="mt-4">
                <x-label for="password" :value="__('Password')"></x-label>
                <x-input id="password"
                         class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required
                         autocomplete="new-password"></x-input>
            </div>

            {{-- Password Confirmation --}}
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')"></x-label>
                <x-input id="password_confirmation"
                         class="block mt-1 w-full"
                         type="password"
                         name="password_confirmation" required></x-input>
            </div>

            <div class="flex mt-4 justify-end">
                <button class="bg-blue-400 shadow rounded-full w-24 py-2 px-4 hover:bg-blue-300 text-white text-sm">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
