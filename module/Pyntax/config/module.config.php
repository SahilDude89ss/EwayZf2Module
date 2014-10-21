<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Pyntax\Controller\Test' => 'Pyntax\Controller\TestController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'pyntax' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/pyntax/eway/test',
                    'defaults' => array(
                        'controller' => 'Pyntax\Controller\Test',
                        'action'     => 'index',
                    ),
                ),
            ),
        )
    ),

    'service_manager' => array(
        'invokables' => array(
            'Pyntax\Service\Eway\Eway' => 'Pyntax\Service\Eway\Eway'
        ),
    ),
);
