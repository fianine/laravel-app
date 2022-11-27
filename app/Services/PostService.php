<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Str;

class PostService
{
    /**
     * @return Post
     */
    public function getPosts()
    {
        return Post::paginate(10);
    }

    /**
     * @param $postId
     * @return Post
     */
    public function getPost($postId)
    {
        return Post::find($postId);
    }

    /**
     * @param Request $request
     * @return Post
     */
    public function create($request)
    {
        return Post::create([
            'id' => Str::uuid(),
            'title' => $request->title,
            'desc' => $request->desc,
            'website_id' => $request->websiteId
        ]);
    }
}
