<?php

namespace App\DTO;
class CommentData
{
    public string $user_name;
    public string $email;
    public string $home_page;
    public string $text;
    public ?int $parent_id;
    public ?int $author_id;

    public function __construct(array $data)
    {
        $this->user_name = $data['user_name'];
        $this->email = $data['email'];
        $this->home_page = $data['home_page'];
        $this->text = $data['text'];
        $this->parent_id = $data['parent_id'];
        $this->author_id = $data['author_id'];
    }
}
