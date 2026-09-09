<?php

require_once __DIR__ . '/../config/config.php';

$origin = $_SERVER['HTTP_ORIGIN'] ?? '';

in_array($origin, $allowedOrigins) ?   
    header("Acess-Control-Allow-Origin: $origin") : null;
header('Acess-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS');
header('Acess-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS'){
    http_response_code(204);
    exit;
}

$uri = strtok($_SERVER['REQUEST_URI'], '?');

match ($uri) {
    '/api/users' => require __DIR__ . '/../src/api.php',
    default => notfound(),
};

function notfound(): void
{
    http_response_code(404);
    echo json_encode(['Error' => 'Not found']);
}