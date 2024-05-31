<?php


use Elasticsearch\ClientBuilder;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/test-elasticsearch', function () {
    $client = ClientBuilder::create()
        ->setHosts(config('elasticsearch.hosts'))
        ->setElasticMetaHeader(false) // Додайте цей рядок, щоб відключити перевірку продукту
        ->build();

    $response = $client->ping();

    return response()->json($response);
});
