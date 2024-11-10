<?php

return [

    'paths' => ['api/*', 'sanctum/csrf-cookie'],  // Allows CORS for API routes and Sanctum CSRF endpoint if needed

    'allowed_methods' => ['*'],  // Allows all HTTP methods (GET, POST, PUT, DELETE, etc.)

    'allowed_origins' => ['*'],  // Allows all origins (for development; replace with specific domains for production)

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],  // Allows all headers, which is necessary for mobile apps

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,  // Set to true if your API needs cookies (not usually required for mobile APIs)
];
