<x-app-layout>
    <div class="flex-1 mx-10">
        <div class="bg-white rounded-xl border-b">
            @forelse($users as $user)
                <div class="flex items-center justify-between p-4 {{ $loop->last ? '' : 'border-b' }}">
                    <div class="flex items-center">
                        <a href="{{ $user->path() }}" class="focus:outline-none">
                            <img class="rounded-full mr-4" src="https://i.pravatar.cc/40" alt="profile image">
                        </a>
                        <a href="{{ $user->path() }}" class="focus:outline-none">
                            <div>
                                <span class="font-bold mb-1">{{ $user->name }}</span>
                                <span class="text-gray-400">{{ '@' . $user->username }}</span>
                            </div>
                        </a>
                    </div>
                    <div class="text-gray-700">
                        Joined
                        {{ $user->created_at->diffForHumans() }}
                    </div>
                </div>
            @empty
                <div class="p-6 text-center text-gray-400">
                    <p>Nobody to follow. Ask your friends to join!</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
