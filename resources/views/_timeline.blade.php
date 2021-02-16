<div class="bg-white mt-4 rounded-xl">
    @foreach($tweets as $tweet)
        <div class="flex items-start p-4 border-b">
            <img class="rounded-full mr-4" src="https://i.pravatar.cc/40" alt="profile image">
            <div>
                <div class="text-sm">
                    <span class="font-bold mb-1">{{ $tweet->user->name }}</span>
                    <span class="text-gray-400">{{ '@' . $tweet->user->username }}</span>
                </div>
                <p>{{ $tweet->body }}</p>
            </div>
        </div>
    @endforeach
</div>
