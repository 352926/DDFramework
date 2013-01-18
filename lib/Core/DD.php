<?php
/**
 * User: Huangdd <352926@qq.com>
 * Date: 13-1-17
 * Time: 20:53
 */
class DD
{
    public static function C($key = '')
    {
        global $config;
        $key = trim($key, ".");
        if (!empty($key)) {
            $keys = explode(".", $key);
            $arr = $config;
            foreach ($keys as $v) {
                if (!empty($v)) {
                    if (isset($arr[$v])) {
                        $arr = $arr[$v];
                    } else {
                        return false;
                    }
                }
            }
            return $arr;
        } else {
            return $config;
        }
    }

    public static function Lang($name)
    {
        global $config;
        if (isset($config['app']) && isset($config['app']['language'])) {
            $f = __ROOT__ . "/lib/Lang/" . $config['app']['language'] . ".php";
            if (file_exists($f) && is_readable($f)) {
                $lang = require $f;
                if (isset($lang[$name])) {
                    return $lang[$name];
                } else {
                    return $name;
                }
            } else {
                DD::ShowErr(500, "语言文件不存在或没有读取权限!");
            }
        } else {
            $f = __ROOT__ . "/lib/Lang/zh-cn.php";
            if (file_exists($f) && is_readable($f)) {
                $lang = require $f;
                if (isset($lang[$name])) {
                    return $lang[$name];
                } else {
                    return $name;
                }
            } else {
                DD::ShowErr(500, "语言文件不存在或没有读取权限!");
            }
        }
        return $name;
    }

    public static function ShowErr($code = 500, $content = "")
    {
        exit($code . ' : ' . $content);
    }
}
