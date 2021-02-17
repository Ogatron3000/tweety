<form action="{{ route('tweets.store') }}" method="POST" class="border-b rounded-xl p-4 bg-white w-full">
    @csrf
    <textarea class="w-full p-0 focus:ring-0 border-0 border-b border-gray-200"
              name="body"
              id="body"
              placeholder="What's happening?"></textarea>
    <div class="flex justify-between items-center mt-2">
        <img class="rounded-full" src="https://i.pravatar.cc/40" alt="profile image">
        <button class="bg-blue-400 shadow rounded-full py-2 px-4 hover:bg-blue-300 text-white text-sm">Submit</button>
    </div>
</form>
