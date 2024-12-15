<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | This configuration file allows you to configure the settings for CORS
    | (Cross-Origin Resource Sharing). You can adjust these settings as needed
    | to control how your application interacts with resources from different origins.
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],  // Apply CORS to API routes

    'allowed_methods' => ['*'],  // Allow all HTTP methods

    'allowed_origins' => ['*'],  // Allow all origins (you can restrict this to specific domains)

    'allowed_headers' => ['*'],  // Allow all headers (you can specify certain headers if needed)

    'exposed_headers' => [],  // Specify any headers to expose to the browser

    'max_age' => 0,  // How long to cache preflight requests

    'supports_credentials' => true,  // Whether to allow credentials (cookies, etc.)

];
