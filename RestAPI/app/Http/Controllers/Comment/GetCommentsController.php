<?php

namespace App\Http\Controllers\Comment;

use App\Http\Resources\Comment\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;

class GetCommentsController extends BaseController
{
    public function  __invoke(): AnonymousResourceCollection
    {
        $comments = Cache::remember('comments', 60, function () {
            return Comment::with('children')->orderBy('created_at', 'desc')->paginate(25);
        });

        return CommentResource::collection($comments);
    }
}
