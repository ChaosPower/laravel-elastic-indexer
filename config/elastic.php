<?php

return [
    'host' => env('ES_HOST', 'localhost'),
    'port' => env('ES_PORT', 9200),
    'version' => env('ES_VERSION', 1.7),
    'ssl' => false,
];