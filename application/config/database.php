<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

// Detect environment: Vercel (PostgreSQL/Supabase) vs Local (MySQL)
$is_production = (ENVIRONMENT === 'production');

if ($is_production && getenv('SUPABASE_DB_HOST')) {
    // Supabase PostgreSQL
    $db['default'] = array(
        'dsn'       => '',
        'hostname'  => getenv('SUPABASE_DB_HOST'),
        'username'  => getenv('SUPABASE_DB_USER') ?: 'postgres',
        'password'  => getenv('SUPABASE_DB_PASS') ?: '',
        'database'  => getenv('SUPABASE_DB_NAME') ?: 'postgres',
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
