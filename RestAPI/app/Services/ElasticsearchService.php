<?php


namespace App\Services;


use Elasticsearch\ClientBuilder;

class ElasticsearchService
{
    protected $client;

    public function __construct()
    {
        $this->client = ClientBuilder::create()
            ->setHosts(config('elasticsearch.hosts'))
            ->build();
    }

    public function searchComments($query): callable|array
    {
        $params = [
            'index' => 'comments',
            'size' => 5,
            'body' => [
                'query' => [
                    'multi_match' => [
                        'query' => $query,
                        'fields' => ['user_name', 'text']
                    ]
                ]
            ]
        ];

        return $this->client->search($params);
    }

    public function indexComment($comment): callable|array
    {
        $params = [
            'index' => 'comments',
            'id' => $comment->id,
            'body' => $comment->toArray()
        ];

        return $this->client->index($params);
    }
}
