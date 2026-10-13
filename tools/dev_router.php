<?php
// Router for PHP's built-in server: php -S 127.0.0.1:8080 -t LAB12 tools/dev_router.php
// Sets CI_ENV=production so CodeIgniter 3.1.6 does not print PHP 8 deprecation notices.
$_SERVER['CI_ENV'] = 'production';
$root = __DIR__ . '/../LAB12';
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($path !== '/' && is_file($root . $path) && substr($path, -4) !== '.php') {
    return false; // static file (images)
}
chdir($root);
$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['PHP_SELF'] = '/index.php';
require $root . '/index.php';
