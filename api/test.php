<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Test 1: Can we output at all?
echo json_encode(['step' => 'api/index.php started']);

// Test 2: Check extensions
$extensions = get_loaded_extensions();
$has_pgsql = in_array('pgsql', $extensions);
$has_pdo_pgsql = in_array('pdo_pgsql', $extensions);
$has_pdo = in_array('pdo', $extensions);
$has_mysqli = in_array('mysqli', $extensions);

echo "\n" . json_encode([
    'step' => 'extensions checked',
    'php' => PHP_VERSION,
    'pgsql' => $has_pgsql,
    'pdo_pgsql' => $has_pdo_pgsql,
    'pdo' => $has_pdo,
    'mysqli' => $has_mysqli,
    'total_extensions' => count($extensions),
]);

// Test 3: Check env vars
echo "\n" . json_encode([
    'step' => 'env vars checked',
    'DB_HOST' => getenv('SUPABASE_DB_HOST') ?: 'NOT_SET',
    'DB_USER' => getenv('SUPABASE_DB_USER') ?: 'NOT_SET',
    'DB_PASS' => getenv('SUPABASE_DB_PASS') ? 'SET' : 'NOT_SET',
    'DB_NAME' => getenv('SUPABASE_DB_NAME') ?: 'NOT_SET',
    'BASE_URL' => getenv('BASE_URL') ?: 'NOT_SET',
    'VERCEL_URL' => getenv('VERCEL_URL') ?: 'NOT_SET',
]);

// Test 4: Try direct pgsql connection
if ($has_pgsql) {
    $host = getenv('SUPABASE_DB_HOST');
    $user = getenv('SUPABASE_DB_USER');
    $pass = getenv('SUPABASE_DB_PASS');
    $db = getenv('SUPABASE_DB_NAME');
    $conn_string = "host={$host} port=5432 dbname={$db} user={$user} password={$pass}";
    $conn = @pg_connect($conn_string);
    if ($conn) {
        echo "\n" . json_encode(['step' => 'pgsql connection', 'status' => 'SUCCESS']);
        pg_close($conn);
    } else {
        echo "\n" . json_encode(['step' => 'pgsql connection', 'status' => 'FAILED', 'error' => pg_last_error()]);
    }
} else {
    echo "\n" . json_encode(['step' => 'pgsql connection', 'status' => 'SKIPPED - extension not loaded']);
}

echo "\n" . json_encode(['step' => 'DONE']);
