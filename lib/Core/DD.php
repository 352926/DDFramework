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

    /**
     * @param $data
     * @param $callback #可以用数组方式传递多个
     */
    public static function JsonEcho($data, $callback)
    {
        $rs = array(
            'code' => 200,
            'data' => $data,
            'callback' => $callback
        );
        exit(json_encode($rs));
    }

    public static function JsonMsg($code, $msg, $url = '')
    {
        $rs = array(
            'code' => $code,
            'msg' => $msg,
            'url' => $url
        );
        exit(json_encode($rs));
    }

    public static function ShowErr($content = "", $code = 500)
    {
        exit("错误码：{$code} <hr> {$content}<hr>请复制此日志ID，咨询管理员，谢谢");
    }

    public static function getModule()
    {
        return isset($_GET['module']) && !empty($_GET['module']) ? trim($_GET['module']) : 'index';
    }

    public static function getAction()
    {
        return isset($_GET['action']) && !empty($_GET['action']) ? trim($_GET['action']) : 'index';
    }

    public static function import($name)
    {
        $str = explode(".", $name);
        $file = "";
        foreach ($str as $p) {
            if ($p) {
                $file .= "/" . $p;
            }
        }
    }
}
