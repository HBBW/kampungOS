<?php
/**
 * KampungOS - Vercel Serverless Entry Point
 * This file bootstraps CodeIgniter 3 on Vercel's PHP runtime.
 */

// Fix paths for Vercel's directory structure
$_SERVER['SCRIPT_FILENAME'] = dirname(__DIR__) . '/index.php';
$_SERVER['SCRIPT_NAME'] = '/index.php';

// Ensure required server vars exist
if (!isset($_SERVER['REQUEST_URI'])) {
    $_SERVER['REQUEST_URI'] = '/';
}
if (!isset($_SERVER['HTTP_HOST'])) {
    $_SERVER['HTTP_HOST'] = parse_url(getenv('VERCEL_URL') ?: 'http://localhost', PHP_URL_HOST);
}

// Bootstrap CodeIgniter
require_once dirname(__DIR__) . '/index.php';
