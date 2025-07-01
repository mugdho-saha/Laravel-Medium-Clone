<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex">
                <div class="flex-1">
                    <h3 class="text-4xl">{{$user->name}}</h3>
                    <div class="mt-4 p-2">
                        @forelse($posts as $post)
                            <x-post-item :post="$post" />
                        @empty
                            <p class="text-center text-gray-400">No Posts available</p>
                        @endforelse

                        {{$posts->onEachSide(1)->links()}}
                    </div>


                </div>
                <x-follower-ctr :user="$user">
                    <x-user-avatar :user="$user" size="w-24 h-24"></x-user-avatar>
                    <h3 class="mt-4">{{$user->name}}</h3>
                    <p class="text-gray-500"><span x-text="followersCount"></span> Followers</p>
                    <p class="text-gray-500">{{$user->bio}}</p>
                    @if(auth()->user() && auth()->user()->id !== $user->id)
                        <div>
                            <button @click="follow()" class="rounded-full text-white px-4 py-2 mt-4 hover:text-black hover:bg-gray-300"
                                    x-text="following ? 'Unfollow' : 'Follow'"
                                    :class="following ? 'bg-red-600' : 'bg-emerald-500'">
                            </button>
                        </div>
                    @endif
                </x-follower-ctr>
            </div>
        </div>
    </div>
</x-app-layout>
