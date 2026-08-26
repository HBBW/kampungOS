<?php
/**
 * KampungOS - Vercel Serverless Entry Point
 */

// Output errors as headers for debugging
error_reporting(E_ALL);
ini_set('display_errors', '0');

register_shutdown_function(function() {
    $error = error_get_last();
    if ($error && in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR])) {
        http_response_code(500);
        header('X-Error-Type: ' . $error['type']);
        header('X-Error-Message: ' . substr($error['message'], 0, 200));
        header('X-Error-File: ' . substr($error['file'], -100));
        header('X-Error-Line: ' . $error['line']);
        header('X-PHP-Version: ' . PHP_VERSION);
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        echo json_encode([
            'error' => true,
            'message' => $error['message'],
            'file' => $error['file'],
            'line' => $error['line'],
            'php' => PHP_VERSION,
        ]);
        exit;
    }
});

$_SERVER['SCRIPT_FILENAME'] = dirname(__DIR__) . '/index.php';
$_SERVER['SCRIPT_NAME'] = '/index.php';

if (!isset($_SERVER['REQUEST_URI'])) {
    $_SERVER['REQUEST_URI'] = '/';
}
if (!isset($_SERVER['HTTP_HOST'])) {
    $_SERVER['HTTP_HOST'] = parse_url(getenv('VERCEL_URL') ?: 'http://localhost', PHP_URL_HOST);
}

chdir(dirname(__DIR__));
require_once __DIR__ . '/../index.php';
