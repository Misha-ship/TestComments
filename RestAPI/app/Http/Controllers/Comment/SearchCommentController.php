<?php

namespace App\Http\Controllers\Comment;

use App\Http\Requests\Comment\SearchCommentRequest;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Comment;
use App\Services\ElasticsearchService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller as BaseController;

class SearchCommentController extends BaseController
{
    protected ElasticsearchService $elasticsearchService;

    public function __construct(ElasticsearchService $elasticsearchService)
    {
        $this->elasticsearchService = $elasticsearchService;
    }

    public function __invoke(SearchCommentRequest $request): AnonymousResourceCollection
    {
        $query = $request->input('query');
        $response = $this->elasticsearchService->searchComments($query);

        // Extract the actual results from the Elasticsearch response
        $results = collect($response['hits']['hits'])->map(function ($hit) {
            // Convert each _source array into a Comment model
            return new Comment($hit['_source']);
        });

        return CommentResource::collection($results);
    }
}
