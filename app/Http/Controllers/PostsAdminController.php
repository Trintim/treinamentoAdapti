<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

class PostsAdminController extends Controller
{
    public function index()
    {
        return view('admin.posts.index');
    }
}
