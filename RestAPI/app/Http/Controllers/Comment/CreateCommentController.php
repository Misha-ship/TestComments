<?php

namespace App\Http\Controllers\Comment;

use App\DTO\CommentData;
use App\Http\Requests\Comment\CreateCommentRequest;
use App\Http\Resources\Comment\CommentResource;
use App\Jobs\IndexComment;
use App\Services\CommentService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;

class CreateCommentController extends BaseController
{
    protected CommentService $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function __invoke(CreateCommentRequest $request): CommentResource
    {
        $commentData = new CommentData($request->validated());

        $comment = $this->commentService->create($commentData);

        Cache::forget('comments');

        IndexComment::dispatch($comment);

        return new CommentResource($comment);
    }
}
