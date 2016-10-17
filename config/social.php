<?php

return [
    'services' => [
        'github' => [
            'name' => 'GitHub',
        ],
        
        'twitter' => [
            'name' => 'Twitter',
        ],
        
        'facebook' => [
            'name' => 'Facebook',
        ],
        
        'google' => [
            'name' => 'Google+',
        ],
    ],
    
    'events' => [
        'github' => [
            'created' => \App\Events\Social\GitHubAccountWasLinked::class,
        ],
        
        'facebook' => [
            'created' => \App\Events\Social\FacebookAccountWasLinked::class,
        ],
    ],
];