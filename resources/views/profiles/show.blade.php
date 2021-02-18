<x-app-layout>
    <div class="flex-1 mx-10">
        <div class="bg-white rounded-xl border-b border-gray-200">
            <div class="relative">
                <img class="rounded-t-xl" src="{{asset('images/default-banner.png')}}" alt="profile banner"/>
                <img class="absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-full"
                     src="https://i.pravatar.cc/150"
                     alt="profile image">
            </div>
            <div class="p-4">
                <div class="flex justify-between ">
                    <div class="w-1/3 break-words">
                        <h1 class="font-bold text-xl">{{ $user->name }}</h1>
                        <h2 class="text-gray-400">{{ '@'.$user->username }}</h2>
                    </div>
                    <div>
                        @if(auth()->id() == $user->id)
                            <a href="{{ route('profiles.edit', $user->username) }}">
                                <button class="bg-blue-400 shadow rounded-full w-24 py-2 px-4 hover:bg-blue-300 text-white text-sm">
                                    Edit
                                </button>
                            </a>
                        @else
                            <form method="POST" action="{{ route('follows.store', $user->username) }}">
                                @csrf
                                <button class="bg-blue-400 shadow rounded-full w-24 py-2 px-4 hover:bg-blue-300 text-white text-sm">
                                    {{ $user->following($user) ? 'Unfollow' : 'Follow' }}
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
                <p class="mt-6">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae consectetur dicta ducimus facere
                    laboriosam officia quam quasi quis sit soluta?
                </p>
            </div>
        </div>
        @include('_timeline', ['tweets' => $user->profile_timeline()])
    </div>
</x-app-layout>
