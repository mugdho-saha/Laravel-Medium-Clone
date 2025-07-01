<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PublicProfileController extends Controller
{
    public function show(Request $request, User $user)
    {
        $posts = $user->posts()->latest()->paginate(10);
        return view('profile.show', ['user' => $user, 'posts' => $posts]);
    }
}
