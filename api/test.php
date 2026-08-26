<?php
header('Content-Type: application/json');

// Check PHP extensions
$pgsql = extension_loaded('pgsql');
$pdo_pgsql = extension_loaded('pdo_pgsql');
$mysqli = extension_loaded('mysqli');

// Check env vars
$host = getenv('SUPABASE_DB_HOST') ?: 'NOT_SET';
$user = getenv('SUPABASE_DB_USER') ?: 'NOT_SET';
$pass = getenv('SUPABASE_DB_PASS') ? 'SET' : 'NOT_SET';
$db   = getenv('SUPABASE_DB_NAME') ?: 'NOT_SET';
$base = getenv('BASE_URL') ?: 'NOT_SET';
$env  = getenv('VERCEL_URL') ?: 'NOT_SET';

echo json_encode([
    'php_version' => PHP_VERSION,
    'extensions' => [
        'pgsql' => $pgsql,
        'pdo_pgsql' => $pdo_pgsql,
        'mysqli' => $mysqli,
    ],
    'env' => [
        'SUPABASE_DB_HOST' => $host,
        'SUPABASE_DB_USER' => $user,
        'SUPABASE_DB_PASS' => $pass,
        'SUPABASE_DB_NAME' => $db,
        'BASE_URL' => $base,
        'VERCEL_URL' => $env,
        'ENVIRONMENT' => ENVIRONMENT ?? 'NOT_DEFINED',
    ]
]);
