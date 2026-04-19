<?php

declare(strict_types=1);

$uri = urldecode((string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH));
$publicRoot = realpath(__DIR__.'/public');
$requestedPath = $publicRoot !== false ? realpath($publicRoot.$uri) : false;

if (
    $publicRoot !== false
    && $requestedPath !== false
    && is_file($requestedPath)
    && str_starts_with($requestedPath, $publicRoot.DIRECTORY_SEPARATOR)
) {
    $extension = strtolower(pathinfo($requestedPath, PATHINFO_EXTENSION));

    if ($extension !== 'php') {
        $mimeType = mime_content_type($requestedPath) ?: 'application/octet-stream';
        header('Content-Type: '.$mimeType);
        header('Content-Length: '.(string) filesize($requestedPath));
        readfile($requestedPath);
        return;
    }
}

require __DIR__.'/public/index.php';
