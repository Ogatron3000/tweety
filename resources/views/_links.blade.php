<div class="p-4 w-1/6 bg-white border-b border-gray-200 rounded-xl">
    <x-nav-link :href="route('tweets.index')" :active="request()->routeIs('tweets.index')">
        {{ __('Home') }}
    </x-nav-link>
    <x-nav-link :href="route('profiles.show', auth()->user()->username)" :active="request()->routeIs('profiles.show')">
        {{ __('Profile') }}
    </x-nav-link>
    <x-nav-link>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="focus:outline-none">
                {{ __('Logout') }}
            </button>
        </form>
    </x-nav-link>
</div>
