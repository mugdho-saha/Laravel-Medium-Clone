@props(['user','size'=>'w-12 h-12'])
@if($user->image)
    <img class="{{$size}} rounded-full" src="{{\Illuminate\Support\Facades\Storage::url($user->image) }}" alt="{{$user->name}}">
@else
    <img src="https://static.vecteezy.com/system/resources/thumbnails/048/216/761/small/modern-male-avatar-with-black-hair-and-hoodie-illustration-free-png.png"
         class="{{$size}} rounded-full">
@endif
