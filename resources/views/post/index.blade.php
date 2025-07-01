<x-app-layout>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">
                    <x-category-tabs>
                        No Categories Found.
                    </x-category-tabs>
                </div>
            </div>
            <div class="mt-8 text-gray-900">
                @forelse($posts as $post)
                    <x-post-item :post="$post" />
                @empty
                    <p class="text-center text-gray-400">No Posts available</p>
                @endforelse

                {{$posts->onEachSide(1)->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
