<?php

return [
    'feeds' => [
        'main' => [
            'items' => 'App\Models\Makarons@getFeedItems',
            'url' => '/makaroni.rss',
            'title' => 'Makaroni Updates',
        ],
    ],
];
