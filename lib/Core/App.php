<?php
/**
 * User: Huangdd <352926@qq.com>
 * Date: 13-1-17
 * Time: 19:41
 */
class App
{
    public $config;
    public $db;
    public $module;
    public $action;
    public $params = array();

    public function __construct()
    {
        global $config;
        $this->config = $config;
        $this->init();
    }

    private function init()
    {
        $this->config['app'] = isset($this->config['app']) || isset($this->config['app']['module']) ?
            $this->config['app'] : array(
                'module' => '/module'
            );
        $this->dispatcher();
    }

    public function run()
    {
        $mod_dir = DD::C('app.module');
        if (substr($mod_dir, 0, 1) != '/') $mod_dir = "/{$mod_dir}";
        $mod_file = __ROOT__ . $mod_dir . "/{$this->module}.php";
        $module = $this->module . "Class";
        $action = $this->action . "Action";

        $this->AutoLoad();

        if (file_exists($mod_file) && is_readable($mod_file)) {
            require_once $mod_file;
            if (class_exists($module)) {
                $mod = new $module();
                if (method_exists($mod, $action)) {
                    $mod->$action();
                } else {
                    $this->NoPage(DD::Lang("NO_ACTION"));
                }
            } else {
                $this->NoPage(DD::Lang("NO_MODULE"));
            }
        } else {
            $this->NoPage(DD::Lang("NO_MODULE_FILE"));
        }


    }

    protected function dispatcher()
    {
        $this->module = isset($_GET['module']) && !empty($_GET['module']) ? trim($_GET['module']) : 'index';
        $this->action = isset($_GET['action']) && !empty($_GET['action']) ? trim($_GET['action']) : 'index';
        $params = isset($_GET['p']) && !empty($_GET['p']) ? trim($_GET['p'], ' /') : '';
        if ($params) {
            $par_arr = explode("/", $params);
            foreach ($par_arr as $k => $v) {
                if (!trim($v)) {
                    unset($par_arr[$k]);
                }
            }
            $p = array_chunk($par_arr, 2);
            foreach ($p as $v) {
                if (isset($v[1])) {
                    $this->params[$v[0]] = $v[1];
                } else {
                    $this->params[$v[0]] = '';
                }
            }
        }
    }

    private function AutoLoad()
    {
        $list = DD::C('import');
        if ($list) {
            if (isset($list['System']) && is_array($list['System'])) {
                foreach ($list['System'] as $f) {
                    if (file_exists(__ROOT__ . "/lib/Core/{$f}.php") && is_readable(__ROOT__ . "/lib/Core/{$f}.php"))
                        require_once __ROOT__ . "/lib/Core/{$f}.php";
                }
            }
            if (isset($list['Developer']) && is_array($list['Developer'])) {
                foreach ($list['Developer'] as $f) {
                    if (substr($f, 0, 1) != '/')
                        $f = "/{$f}";
                    if (file_exists(__ROOT__ . "{$f}.php") && is_readable(__ROOT__ . "{$f}.php"))
                        require_once __ROOT__ . "{$f}.php";
                }
            }
        }
    }

    public static function NoPage($content = "")
    {
        header('HTTP/1.1 404 Not Found');
        exit("404<hr>{$content}");
    }

    public function showErr($content)
    {
        header('HTTP/1.1 500 Internal Server Error');
        exit($content);
    }
}
