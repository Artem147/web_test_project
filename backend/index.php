<?php

require 'vendor/autoload.php';
require 'initialize_database.php';
use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
$app = AppFactory::create();

$app->setBasePath('/comments_app');

$app->delete('/api/delete/{id}', function (Request $request, Response $response, $args) use ($db) {
    $commentId = $args['id'];

    $deleteQuery = $db->prepare("DELETE FROM comments WHERE id = ?");
    $deleteQuery->execute([$commentId]);

    return $response->withStatus(204);
});

$app->post('/api/add', function (Request $request, Response $response) use ($db) {
    $queryParams = $request->getQueryParams();
    $name = $queryParams['name'] ?? 'Name';
    $text = $queryParams['text'] ?? 'Text';
    $time = date('Y-m-d H:i:s');

    $insertQuery = $db->prepare("INSERT INTO comments (name, text, time) VALUES (?, ?, ?)");
    $insertQuery->execute([$name, $text, $time]);

    $newComment = [
        'id' => $db->lastInsertId(),
        'name' => $name,
        'text' => $text,
        'time' => $time
    ];

    $response = $response->withHeader('Content-Type', 'application/json');
    $response->getBody()->write(json_encode($newComment));

    return $response;
});

$app->get('/api/read', function (Request $request, Response $response) use ($db) {
    $query = $db->query("SELECT * FROM comments");
    $comments = $query->fetchAll(PDO::FETCH_ASSOC);

    $response = $response->withHeader('Content-Type', 'application/json');
    $response->getBody()->write(json_encode($comments));

    return $response;
});

$app->run();