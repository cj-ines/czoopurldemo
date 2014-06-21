<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'CzoopUrl\Controller\Base' => 'CzoopUrl\Controller\BaseController',
            'CzoopUrl\Controller\Route' => 'CzoopUrl\Controller\RouteController',
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'application_entities' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/CzoopUrl/Entity'
                )
            ),
            'orm_default' => array(
                'drivers' => array(
                    'CzoopUrl\Entity' => 'application_entities'
                )
            )
        )
    ),

    'router' => array(
        'routes' => array(
            'czoopurl' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/go',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'CzoopUrl\Controller',
                        'controller'    => 'Route',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'croute' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'     => '[/:action][/:slug][/:environment]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'slug' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'environment' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                ),
                            'defaults' => array(
                                'controller' => 'Route',
                                'action' => 'index',
                            )
                        ),
                    ),
                    
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'CzoopUrl' => __DIR__ . '/../view',
        ),
    ),
);
