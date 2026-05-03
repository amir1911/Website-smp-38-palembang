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

// Forward semua request ke Laravel's public/index.php
require __DIR__ . '/../public/index.php';
