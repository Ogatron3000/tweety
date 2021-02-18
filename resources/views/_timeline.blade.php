<div class="bg-white mt-4 rounded-xl border-b">
    @forelse($tweets as $tweet)
        <div class="flex items-center p-4 {{ $loop->last ? '' : 'border-b' }}">
            <a href="{{ $tweet->user->path() }}" class="focus:outline-none">
                <img class="rounded-full mr-4" src="https://i.pravatar.cc/40" alt="profile image">
            </a>
            <div>
                <a href="{{ $tweet->user->path() }}" class="focus:outline-none">
                    <div class="text-sm">
                        <span class="font-bold mb-1">{{ $tweet->user->name }}</span>
                        <span class="text-gray-400">{{ '@' . $tweet->user->username }}</span>
                    </div>
                </a>
                <p>{{ $tweet->body }}</p>
            </div>
        </div>
    @empty
        <div class="p-6 text-center text-gray-400">
            <p>Nothing to show yet.</p>
        </div>
    @endforelse
</div>
