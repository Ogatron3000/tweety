<x-app-layout>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
{{--            <x-logo class="text-4xl text-center"></x-logo>--}}
            <div class="flex justify-between items-start overflow-hidden">
                @include('_links')
                <div class="flex-1 mx-10">
                    @include('_publish-tweet-form')
                    @include('_timeline')
                </div>
                @include('_friends')
            </div>
        </div>
    </div>
</x-app-layout>
