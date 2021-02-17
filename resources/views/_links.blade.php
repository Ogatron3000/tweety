<div class="p-4 w-1/6 bg-white border-b border-gray-200 rounded-xl">
    <x-nav-link :href="route('tweets.index')" :active="request()->routeIs('dashboard')">
        {{ __('Home') }}
    </x-nav-link>
</div>
