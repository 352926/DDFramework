<?php
/**
 * User: Huangdd <352926@qq.com>
 * Date: 13-1-17
 * Time: 19:53
 */

if (version_compare(PHP_VERSION, '5.0.0', '<')) {
    die('PHP版本需要高于 5.0 !');
}
define('VERSION', '1.0');
define('__TIME__', time());
$GLOBALS['_StartTime'] = microtime(TRUE);
header("Content-type:text/html;charset=UTF-8");
$config = require __ROOT__ . "/data/config.php";
require __ROOT__ . "/lib/Core/DD.php";
require __ROOT__ . "/lib/Core/DB.php";
require __ROOT__ . "/lib/Core/Model.php";
require __ROOT__ . "/lib/Core/Tpl.php";
require __ROOT__ . "/lib/Core/App.php";
require __ROOT__ . "/lib/Core/Module.php";
