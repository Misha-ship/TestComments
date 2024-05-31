<?php

namespace App\GraphQL\Mutations;

use App\Jobs\IndexComment;
use App\Models\Comment;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use Illuminate\Support\Facades\Cache;

class CreateCommentMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createComment',
    ];

    public function type(): Type
    {
        return GraphQL::type('Comment');
    }

    public function args(): array
    {
        return [
            'user_name' => [
                'name' => 'user_name',
                'type' => Type::nonNull(Type::string()),
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::nonNull(Type::string()),
            ],
            'home_page' => [
                'name' => 'home_page',
                'type' => Type::string(),
            ],
            'text' => [
                'name' => 'text',
                'type' => Type::nonNull(Type::string()),
            ],
            'parent_id' => [
                'name' => 'parent_id',
                'type' => Type::int(),
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $comment = Comment::create([
            'user_name' => $args['user_name'],
            'email' => $args['email'],
            'home_page' => $args['home_page'] ?? null,
            'text' => $args['text'],
            'parent_id' => $args['parent_id'] ?? null,
        ]);

        Cache::forget('comments');

        IndexComment::dispatch($comment);

        return $comment;
    }
}
