<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

// Helper to read env vars (works on Vercel, XAMPP, etc.)
function app_env($key, $default = null) {
    $val = getenv($key);
    if ($val !== false && $val !== '') return $val;
    if (isset($_ENV[$key]) && $_ENV[$key] !== '') return $_ENV[$key];
    if (isset($_SERVER[$key]) && $_SERVER[$key] !== '') return $_SERVER[$key];
    return $default;
}

// Detect environment: Vercel (PostgreSQL/Supabase) vs Local (MySQL)
$is_production = (ENVIRONMENT === 'production');

if ($is_production && app_env('SUPABASE_DB_HOST')) {
    // Check if PostgreSQL extension is available
    if (!extension_loaded('pgsql') && !extension_loaded('pdo_pgsql')) {
        // Fallback: try MySQL if pgsql not available
        $db['default'] = array(
            'dsn'       => '',
            'hostname'  => app_env('SUPABASE_DB_HOST', 'localhost'),
            'username'  => app_env('SUPABASE_DB_USER', 'root'),
            'password'  => app_env('SUPABASE_DB_PASS', ''),
            'database'  => app_env('SUPABASE_DB_NAME', 'postgres'),
            'dbdriver'  => 'mysqli',
            'dbprefix'  => '',
            'pconnect'  => FALSE,
            'db_debug'  => FALSE,
            'cache_on'  => FALSE,
            'cachedir'  => '',
            'char_set'  => 'utf8',
            'dbcollat'  => 'utf8_general_ci',
            'swap_pre'  => '',
            'encrypt'   => FALSE,
            'compress'  => FALSE,
            'stricton'  => FALSE,
            'failover'  => array(),
            'save_queries' => FALSE
        );
    } else {
        // Supabase PostgreSQL
        $db['default'] = array(
            'dsn'       => 'pgsql:host=' . app_env('SUPABASE_DB_HOST') . ';port=5432;dbname=' . app_env('SUPABASE_DB_NAME', 'postgres'),
            'hostname'  => app_env('SUPABASE_DB_HOST'),
            'username'  => app_env('SUPABASE_DB_USER', 'postgres'),
            'password'  => app_env('SUPABASE_DB_PASS', ''),
            'database'  => app_env('SUPABASE_DB_NAME', 'postgres'),
            'dbdriver'  => 'postgre',
            'dbprefix'  => '',
            'pconnect'  => FALSE,
            'db_debug'  => FALSE,
            'cache_on'  => FALSE,
            'cachedir'  => '',
            'char_set'  => 'utf8',
            'dbcollat'  => 'utf8',
            'swap_pre'  => '',
            'encrypt'   => FALSE,
            'compress'  => FALSE,
            'stricton'  => FALSE,
            'failover'  => array(),
            'save_queries' => FALSE
        );
    }
} else {
    // Local MySQL (XAMPP)
    $db['default'] = array(
        'dsn'       => '',
        'hostname'  => 'localhost',
        'username'  => 'root',
        'password'  => '',
        'database'  => 'kampungos',
        'dbdriver'  => 'mysqli',
        'dbprefix'  => '',
        'pconnect'  => FALSE,
        'db_debug'  => (ENVIRONMENT !== 'production'),
        'cache_on'  => FALSE,
        'cachedir'  => '',
        'char_set'  => 'utf8',
        'dbcollat'  => 'utf8_general_ci',
        'swap_pre'  => '',
        'encrypt'   => FALSE,
        'compress'  => FALSE,
        'stricton'  => FALSE,
        'failover'  => array(),
        'save_queries' => TRUE
    );
}
