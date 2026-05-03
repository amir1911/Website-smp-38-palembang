<?php

/*
|--------------------------------------------------------------------------
| Vercel Serverless Entry Point
|--------------------------------------------------------------------------
|
| File ini menjadi entry point untuk Vercel serverless function.
| Semua request dari Vercel akan diarahkan ke sini, lalu diteruskan
| ke public/index.php milik Laravel.
|
*/

// Matikan tampilan error deprecation dari PHP 8.5 di layar
ini_set('display_errors', '0');
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);

// Forward semua request ke Laravel's public/index.php
require __DIR__ . '/../public/index.php';
