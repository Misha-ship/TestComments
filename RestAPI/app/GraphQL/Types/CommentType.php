<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CommentType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Comment',
        'description' => 'A comment',
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the comment',
            ],
            'user_name' => [
                'type' => Type::string(),
                'description' => 'The name of the user',
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The email of the user',
            ],
            'home_page' => [
                'type' => Type::string(),
                'description' => 'The home page of the user',
            ],
            'text' => [
                'type' => Type::string(),
                'description' => 'The text of the comment',
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'The creation date of the comment',
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'The update date of the comment',
            ],
            'children' => [
                'type' => Type::listOf(GraphQL::type('Comment')),
                'description' => 'The children of the comment',
            ],
        ];
    }
}
