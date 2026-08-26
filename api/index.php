<?php
/**
 * KampungOS - Vercel Serverless Entry Point
 */

// Maximum error reporting
error_reporting(E_ALL);
ini_set('display_errors', '0');
ini_set('log_errors', '1');
ini_set('error_log', '/tmp/php_errors.log');

// Catch ALL errors and output them as JSON
register_shutdown_function(function() {
    $error = error_get_last();
    if ($error && in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR])) {
        http_response_code(500);
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        echo json_encode([
            'error' => true,
            'type' => $error['type'],
            'message' => $error['message'],
            'file' => $error['file'],
            'line' => $error['line'],
            'php_version' => PHP_VERSION,
            'extensions' => array_filter(get_loaded_extensions()),
        ]);
        exit;
    }
});

// Quick diagnostic - check pgsql extension
if (!extension_loaded('pgsql') && !extension_loaded('pdo_pgsql')) {
    // PostgreSQL not available - fall back to a simple response
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    echo json_encode([
        'error' => true,
        'message' => 'PostgreSQL extension not available. PHP version: ' . PHP_VERSION,
        'extensions' => array_filter(get_loaded_extensions()),
        'has_pdo' => extension_loaded('pdo'),
        'has_mysqli' => extension_loaded('mysqli'),
    ]);
    exit;
}

// Ensure we're in the right directory context
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
