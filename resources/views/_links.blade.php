<div class="p-6 w-1/6 bg-white border-b border-gray-200 rounded-xl">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-nav-link>
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('explore')">
        {{ __('Explore') }}
    </x-nav-link>
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('profile')">
        {{ __('Profile') }}
    </x-nav-link>
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('explore')">
        {{ __('Explore') }}
    </x-nav-link>
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('profile')">
        {{ __('Profile') }}
    </x-nav-link>
</div>
