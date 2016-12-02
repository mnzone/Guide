<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
    'default' => array(
        'type'           => 'mysqli',
        'connection'     => array(
            'hostname'   => '211.149.206.152',
            'port'       => '3306',
            'database'   => 'guide',
            'username'   => 'ray-dev',
            'password'   => 'ray33705910',
            'persistent' => false,
            'compress'   => false,
        ),
        'identifier'     => '`',
        'table_prefix'   => '',
        'charset'        => 'utf8',
        'enable_cache'   => true,
        'profiling'      => false,
    ),
    'redis' => array(
        'default'     => array(
            'hostname'   => '127.0.0.1',
            'port'       => '6379',
            'database'   => '1',
            'password'   => ''
        )
    ),
);
