<?php
/**
 * User: Huangdd <352926@qq.com>
 * Date: 13-1-13
 * Time: 13:14
 */
if (function_exists('xdebug_start_trace')) {
    xdebug_start_trace();
}
define("__ROOT__", dirname(__FILE__));
require(__ROOT__ . "/lib/Dingding.php");
$app = new App();
$app->run();
register_shutdown_function(function () {
    if (function_exists('xdebug_stop_trace'))
        print_r("<hr>" . str_replace("\n", "<BR>", file_get_contents(xdebug_stop_trace())));
});