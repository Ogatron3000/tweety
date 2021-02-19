<div class="p-4 w-1/6 bg-white border-b border-gray-200 rounded-xl">
    <h2 class="font-bold text-gray-700 mb-2">Friends</h2>
    @forelse($friends as $friend)
        <div class="flex items-center py-2">
            <a href="{{ $friend->path() }}" class="focus:outline-none">
                <img class="rounded-full mr-3" style="width: 40px; height: 40px; object-fit: cover" src="{{ $friend->avatar }}" alt="profile image">
            </a>
            <a href="{{ $friend->path() }}" class="focus:outline-none w-3/4 text-sm break-words">
                <span class="font-bold mb-1">{{ $friend->name }}</span>
                <span class="text-gray-400">{{ '@' . $friend->username }}</span>
            </a>
        </div>
    @empty
        <div class="p-6 text-center text-gray-400">
            <p>No friends yet.</p>
        </div>
    @endforelse
</div>
