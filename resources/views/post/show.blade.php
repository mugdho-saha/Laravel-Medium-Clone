<x-app-layout>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h1 class="mb-4" style="font-size: 48px;font-weight: bold;">
                    {{$post->title}}</h1>

                {{--user avatar section--}}
                <div class="flex g-4">
                    <x-user-avatar :user="$post->user"></x-user-avatar>
                    <div class="ps-3">
                        <x-follower-ctr :user="$post->user" class="flex gap-2">
                            <a href="{{route('profile.show',$post->user)}}" class="hover:underline">
                                <h3>{{$post->user->name}}</h3>
                            </a>
                            @auth
                                @if(auth()->user() && auth()->user()->id !== $post->user->id)
                                    <button href="#" x-text="following ? 'Unfollow' : 'follow'"
                                            :class="following ? 'text-red-600':'text-emerald-600'"
                                            @click="follow()"></button>
                                @endif
                            @endauth
                        </x-follower-ctr>

                        <div class="flex gap-2 text-gray-500 text-sm">
                            {{$post->readTime()}} min read
                            &middot;
                            {{$post->created_at->format('M d, Y')}}
                        </div>
                    </div>
                </div>
                {{--user avatar section--}}

                {{--clap section--}}
                <x-clap-component :post="$post"></x-clap-component>
                {{--clap section--}}


                {{--post contain section--}}
                <div class="mt-8">
                    <img src="{{\Illuminate\Support\Facades\Storage::url($post->image)}}" alt="{{$post->title}}" class="w-full">
                    <div class="mt-4">
                        {{$post->content}}
                    </div>

                </div>
                {{--post contain section--}}


                {{--post category section--}}
                <div class="mt-8">
                    <span class="px-4 py-2 bg-gray-200 rounded-xl">
                        {{$post->category->name}}
                    </span>
                </div>
                {{--post category section--}}

                {{--clap section--}}
                <x-clap-component :post="$post"></x-clap-component>
                {{--clap section--}}
            </div>
        </div>
    </div>
</x-app-layout>
