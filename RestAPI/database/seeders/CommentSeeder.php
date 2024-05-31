<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $chunks = 1000;
        $total = 100000;

        for ($i = 0; $i < $total; $i += $chunks) {
            $comments = Comment::factory()->count($chunks)->make()->toArray();
            DB::table('comments')->insert($comments);
        }
    }
}
