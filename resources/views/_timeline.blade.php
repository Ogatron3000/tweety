<div class="bg-white mt-4 rounded-xl border-b">
    @forelse($tweets as $tweet)
        <div class="flex items-start p-4 pb-2 {{ $loop->last ? '' : 'border-b' }}">
            <a href="{{ $tweet->user->path() }}" class="focus:outline-none">
                <img class="rounded-full mr-3"
                     src="{{ $tweet->user->avatar }}"
                     style="width: 40px; height: 40px; object-fit: cover"
                     alt="profile image">
            </a>
            <div>
                <a href="{{ $tweet->user->path() }}" class="focus:outline-none">
                    <div class="text-sm">
                        <span class="font-bold mb-1">{{ $tweet->user->name }}</span>
                        <span class="text-gray-400">{{ '@' . $tweet->user->username }}</span>
                    </div>
                </a>
                <p>{{ $tweet->body }}</p>
                @if( ! $tweet->isLikedBy(auth()->user()))
                    <div class="flex items-start text-gray-300 mt-2">
                        {{-- likeCount() adds additional query, so instead we add scope withLikes() to tweet query whoose result we provide here as $tweet --}}
                        {{-- that way we have 1 query less, and $tweet->likes avaliable on $tweet --}}
                        {{-- <span class="mr-1"> {{ $tweet->likeCount() }}</span> --}}
                        <span class="mr-1">{{ $tweet->likes ?: 0 }}</span>

                        <form action="{{ route('likes.store', ['tweet_id' => $tweet->id]) }}" method="POST">
                            @csrf
                @else
                    <div class="flex items-start text-gray-300 mt-2 text-blue-400">
                        {{--<span class="mr-1"> {{ $tweet->likeCount() }}</span>--}}
                        <span class="mr-1">{{ $tweet->likes ?: 0 }}</span>
                        <form action="{{ route('likes.destroy', $tweet->getLikeID()) }}" method="POST">
                            @csrf
                            @method('DELETE')
                @endif
                <button type="submit" class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 20 20"
                         fill="currentColor"
                         width="20">
                        <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/>
                    </svg>
                </button>
                        </form>
                    </div>
                    </div>
            </div>
            @empty
                <div class="p-6 text-center text-gray-400">
                    <p>Nothing to show yet.</p>
                </div>
            @endforelse
        </div>
