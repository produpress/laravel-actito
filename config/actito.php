<?php

return [
    //Actito api key
    'key' => env('ACTITO_KEY'),
    //Actito default endpoint
    'uri' => env('ACTITO_URI', 'https://api3.actito.com/'),
    // Default entity name
    'entity' => env('ACTITO_ENTITY'),
    //Default table id
    'table' => env('ACTITO_TABLE')
];
