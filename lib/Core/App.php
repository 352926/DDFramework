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
    public $params;

    public function __construct()
    {
        global $config;
        $this->config = $config;
        if (isset($config['mysql']) && isset($config['mysql']['host']) && isset($config['mysql']['user']) && isset($config['mysql']['database'])) {
            $this->db = new
            DB($config['mysql']['host'], $config['mysql']['user'], $config['mysql']['pwd'], $config['mysql']['database']);
            $this->init();
        } else {
            $this->showErr(DD::Lang("NO_MYSQL_CONFIG"));
        }
    }

    private function init()
    {
        $this->config['app'] = isset($this->config['app']) || isset($this->config['app']['module']) ?
            $this->config['app'] : array(
                'module' => '/module'
            );
    }

    public function run()
    {
    }

    private function dispatcher()
    {
        if (isset($_GET['module']) && !empty($_GET['module']) && isset($_GET['action']) && !empty($_GET['action'])) {
            $this->module = empty($_GET['module']) ? "index" : $_GET['module'];
            $this->action = $_GET['action'] ? "index" : $_GET['action'];
            $mod_file = __ROOT__ . $this->config['app']['module'] . "/{$this->module}.php";
            $module = $this->module . "Class";
            $action = $this->action . "Action";
            if (file_exists($mod_file) && class_exists($module)) {
                $mod = new $module();
                if (method_exists($mod, $action)) {
                    $mod->$action();
                } else {
                    $this->NoPage(DD::Lang("NO_ACTION"));
                }
            } else {
                $this->NoPage(DD::Lang("NO_MODULE"));
            }
            $params = isset($_GET['params']) ? $_GET['params'] : '';
            if ($params) {

            }
        } else {
            //error
            $this->NoPage(DD::Lang("NO_MODULE"));
        }
    }

    public static function NoPage($content = "")
    {
        header('HTTP/1.1 404 Not Found');
        echo $content;
    }

    public function showErr($content)
    {
        header('HTTP/1.1 500 Internal Server Error');
        exit($content);
    }
}
