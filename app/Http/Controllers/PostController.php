<?php

namespace App\Http\Controllers;

use Exception;
use App\Events\SendEmail;
use Illuminate\Http\Request;
use App\Services\PostService;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        return PostResource::collection(
            $this->postService->getPosts()
        );
    }

    public function show(Request $request)
    {
        return new PostResource(
            $this->postService->getPost($request->postId)
        );
    }

    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => [
                'required'
            ],
            'desc' => [
                'required'
            ],
            'websiteId' => [
                'required',
                'exists:websites,id'
            ]
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $post = $this->postService->create($request);
        event(new SendEmail($post));

        return response()->json([
            'error' => false,
            'message' => 'Successfully'
        ]);
    }
}
