<?php

use App\GraphQL\Queries\CommentsQuery;
use App\GraphQL\Mutations\CreateCommentMutation;
use App\GraphQL\Types\CommentType;
use App\GraphQL\Types\PaginatedCommentsType;

return [
    'schemas' => [
        'default' => [
            'query' => [
                'comments' => CommentsQuery::class,
            ],
            'mutation' => [
                'createComment' => CreateCommentMutation::class,
            ],
        ],
    ],
    'types' => [
        'Comment' => CommentType::class,
        'PaginatedComments' => PaginatedCommentsType::class,
    ],
];
