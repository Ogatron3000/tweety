<form action="{{ route('tweets.store') }}" method="POST" class="border-b rounded-xl p-4 bg-white w-full">
    @csrf
    <textarea class="w-full p-0 focus:ring-0 focus:border-blue-400 border-0 border-b border-gray-200"
              style="min-height: 5rem; max-height: 15rem"
              name="body"
              id="body"
              placeholder="What's happening?"></textarea>
    @error('body')
        <div class="text-sm text-red-500 mt-2">{{ $message }}</div>
    @enderror
    <div class="flex justify-between items-center mt-2">
        <img class="rounded-full" src="{{ auth()->user()->avatar }}" style="width: 40px; height: 40px; object-fit: cover" alt="profile image">
        <button class="bg-blue-400 shadow rounded-full py-2 px-4 hover:bg-blue-300 text-white text-sm">Submit</button>
    </div>
</form>
