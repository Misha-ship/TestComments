<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class PaginatedCommentsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PaginatedComments',
        'description' => 'A paginated list of comments',
    ];

    public function fields(): array
    {
        return [
            'data' => [
                'type' => Type::listOf(GraphQL::type('Comment')),
                'description' => 'The comments',
            ],
            'total' => [
                'type' => Type::int(),
                'description' => 'The total number of comments',
            ],
            'per_page' => [
                'type' => Type::int(),
                'description' => 'The number of comments per page',
            ],
            'current_page' => [
                'type' => Type::int(),
                'description' => 'The current page',
            ],
            'last_page' => [
                'type' => Type::int(),
                'description' => 'The last page',
            ],
        ];
    }
}
