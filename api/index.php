<?php
/**
 * KampungOS - Vercel Serverless Entry Point
 */

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Ensure we're in the right directory context
$_SERVER['SCRIPT_FILENAME'] = dirname(__DIR__) . '/index.php';
$_SERVER['SCRIPT_NAME'] = '/index.php';

if (!isset($_SERVER['REQUEST_URI'])) {
    $_SERVER['REQUEST_URI'] = '/';
}
if (!isset($_SERVER['HTTP_HOST'])) {
    $_SERVER['HTTP_HOST'] = parse_url(getenv('VERCEL_URL') ?: 'http://localhost', PHP_URL_HOST);
}

// Change to project root so relative paths work
chdir(dirname(__DIR__));

// Bootstrap CodeIgniter
require_once __DIR__ . '/../index.php';
