<?php
/**
 * User: Huangdd <352926@qq.com>
 * Date: 13-1-22
 * Time: 下午2:41
 */
define("__ROOT__", dirname(__FILE__));
require(__ROOT__ . "/lib/Dingding.php");
$app = new App();
$app->ajax = true;
$app->run();