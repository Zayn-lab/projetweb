<?php
// Project base URL (path from the web server root to this project folder).
// Adjust this if your project is served from a different path or virtual host.
// Example: if your site is at http://localhost/ghh, set '/ghh'
$baseUrl = '/projet-web1-main';

// If you prefer, set to '' or '/' to use site root, or to an empty string to use relative links.
// $baseUrl = '/';

// Normalize (no trailing slash except for root)
if ($baseUrl !== '/' ) {
    $baseUrl = rtrim($baseUrl, '/');
}

?>
