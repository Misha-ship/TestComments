<?php

namespace App\Services;

use App\DTO\CommentData;
use App\Models\Comment;

class CommentService
{
    public function create(CommentData $data)
    {
        return Comment::create([
            'user_name' => $data->user_name,
            'email' => $data->email,
            'home_page' => $data->home_page,
            'text' => $data->text,
            'parent_id' => $data->parent_id,
            'author_id' => $data->author_id,
        ]);
    }
}
