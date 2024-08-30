<?php
// index.php

// Get the URL path from the request
$urlPath = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// Split the URL path by '/'
$segments = explode('/', $urlPath);

// Define the base directories for views and tasks
$viewsDir = __DIR__ . '/views/';
$tasksDir = __DIR__ . '/tasks/';

// If URL path is empty or 'index', load the default index view
if (empty($urlPath) || $urlPath === 'index') {
    include $viewsDir . 'index.php';

// Check if the first URL segment corresponds to a view file
} elseif (file_exists($viewsDir . $segments[0] . '.php')) {
    include $viewsDir . $segments[0] . '.php';

// Check if the first URL segment corresponds to a task file
} elseif (file_exists($tasksDir . $segments[0] . '.php')) {
    include $tasksDir . $segments[0] . '.php';

// If no matching file is found, show a 404 error page
} else {
    header("HTTP/1.0 404 Not Found");
    echo '404 Not Found';
}
?>
