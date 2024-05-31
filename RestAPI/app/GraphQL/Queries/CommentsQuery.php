<?php

namespace App\GraphQL\Queries;

use App\Models\Comment;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Illuminate\Support\Facades\Cache;

class CommentsQuery extends Query
{
    protected $attributes = [
        'name' => 'comments',
    ];

    public function type(): Type
    {
        return GraphQL::type('PaginatedComments');
    }

    public function args(): array
    {
        return [
            'page' => [
                'name' => 'page',
                'type' => Type::int(),
            ],
            'limit' => [
                'name' => 'limit',
                'type' => Type::int(),
            ],
        ];
    }

    public function resolve($root, $args): array
    {
        $page = $args['page'] ?? 1;
        $limit = $args['limit'] ?? 25;

        Cache::forget("comments_page_{$page}_limit_{$limit}");

        $comments = Cache::remember("comments_page_{$page}_limit_{$limit}", 60, function () use ($page, $limit) {
            return Comment::with('children')->orderBy('created_at', 'desc')->paginate($limit, ['*'], 'page', $page);
        });

        return [
            'data' => $comments->items(),
            'total' => $comments->total(),
            'per_page' => $comments->perPage(),
            'current_page' => $comments->currentPage(),
            'last_page' => $comments->lastPage(),
        ];
    }
}
