<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-start overflow-hidden">
                @include('_links')
                <div class="flex-1 mx-10">
                    @include('_publish-tweet-form')
                    @include('_timeline')
                </div>
                @include('_firends')
            </div>
        </div>
    </div>
</x-app-layout>
