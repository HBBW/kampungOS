<?php
/**
 * KampungOS - Vercel Serverless Entry Point
 */

// Catch ALL fatal errors
register_shutdown_function(function() {
    $error = error_get_last();
    if ($error && in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR])) {
        http_response_code(500);
        header('Content-Type: text/plain');
        header('Access-Control-Allow-Origin: *');
        echo "PHP FATAL ERROR:\n";
        echo "Type: " . $error['type'] . "\n";
        echo "Message: " . $error['message'] . "\n";
        echo "File: " . $error['file'] . "\n";
        echo "Line: " . $error['line'] . "\n";
        echo "PHP: " . PHP_VERSION . "\n";
        echo "Extensions: " . implode(', ', get_loaded_extensions()) . "\n";
        exit;
    }
});

error_reporting(E_ALL);
ini_set('display_errors', '1');

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
