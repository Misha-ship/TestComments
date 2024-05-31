<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Comment;
use App\Services\ElasticsearchService;

class IndexComments extends Command
{
    protected $signature = 'comments:index';
    protected $description = 'Index all comments in Elasticsearch';

    protected ElasticsearchService $elasticsearchService;

    public function __construct(ElasticsearchService $elasticsearchService)
    {
        parent::__construct();
        $this->elasticsearchService = $elasticsearchService;
    }

    public function handle()
    {
        $this->info('Indexing all comments...');

        Comment::chunk(100, function ($comments) {
            foreach ($comments as $comment) {
                $this->elasticsearchService->indexComment($comment);
                $this->info('Indexed comment ID: ' . $comment->id);
            }
        });

        $this->info('All comments have been indexed successfully.');
    }
}
