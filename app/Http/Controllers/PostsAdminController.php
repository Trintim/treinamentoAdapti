<?php

namespace App\Http\Controllers;

//use Illuminate\Support\Facades\PostRequest;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

class PostsAdminController extends Controller
{
    /**
     * @var Post
     */

    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post->paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(PostRequest $request)
    {
        
        $post = $this->post->create($request->all());
        $post->tags()->sync($this->getTagsIds($request->tags));

        return redirect()->route('admin.posts.index');
    }

    public function edit($id)
    {
        $post = $this->post->find($id);
        return view('admin.posts.edit', compact('post'));
    }

    public function update($id, PostRequest $request)
    {
        $post = $this->post->find($id);
        
        $post->update($request->all());
        $post->tags()->sync($this->getTagsIds($request->tags));
        
        return redirect()->route('admin.posts.index');
    }

    public function destroy($id)
    {
        $this->post->find($id)->delete();
        return redirect()->route('admin.posts.index');
    }

    private function getTagsIds($tags)
    {
        $tagsList = array_filter(array_map('trim', explode(',', $tags)));
        $tagsIDs = [];
        
        foreach ($tagsList as $tagName) {
            $tagsIDs[] = Tag::firstOrCreate(['name' => $tagName])->id;
        }
        
        return $tagsIDs;
    }

}