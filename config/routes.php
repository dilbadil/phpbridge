<?php 

return [
    'default' => '/topic/list',
    'errors' => '/error/:code',
    'routes' => [
        '/topic(/:action(/:id))' => [
            'controller' => '\Suggestotron\Controller\Topics',
            'action'    => 'list',
        ],
        '/vote(/:action(/:id))' => [
            'controller' => '\Suggestotron\Controller\Votes',
            'action'    => 'index'
        ],
        '/about(/:action(/:id))' => [
            'controller' => '\Suggestotron\Controller\About',
            'action'    => 'index'
        ],
        '/:controller(/:action)' => [
            'controller' => '\Suggestotron\Controller\:controller',
            'action'    => 'index',
        ]
    ]
];
