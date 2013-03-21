<?php
/**
 * User: Huangdd <352926@qq.com>
 * Date: 13-1-17
 * Time: 20:03
 */
return array(
    'mysql' => array(
        'host' => '127.0.0.1',
        'user' => 'root',
        'pwd' => 'hdd',
        'database' => 'ciweishop',
        'pre' => 'dd_',
    ),
    'slaver' => array(
        'host' => '127.0.0.1',
        'user' => 'root',
        'pwd' => 'hdd',
        'database' => 'ciweishop',
        'pre' => 'dd_',
    ),
    'app' => array(
        'module' => "/module",
        'template' => "/view",
        'language' => "zh-cn",
    ),
    'cache' => array(
        'cache_dir' => '/data/cache',
    ),
    'import' => array(
        'System' => array('Cache'),
        'Developer' => array(
            '/inc/test', # {ROOT}/inc/test.php
        ),
    )
);
