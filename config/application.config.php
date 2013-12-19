<?php
return array(
    'modules' => array(
                'ZendDeveloperTools',
            'Application',
            'DoctrineModule',
            'DoctrineORMModule',
            'ZfcBase',
            'ZfcUser',
            'ZfcUserDoctrineORM',
             'BjyProfiler',
        	'ZfcAdmin',
            'BjyAuthorize',
        'SamUser',
         'Admin',
        
    		
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'module_paths' => array(
            './module',
            './vendor',
        ),
    ),
);