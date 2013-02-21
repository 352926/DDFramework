<?php
class tpl
{
    public $layout;
    private $file;
    private $path;
    private $module;
    private $action;
    private $var;
    private $assign = array();

    /**
     * $name参数：模板文件名，不必包含后缀。
     * $path参数：模板文件路径，注：模板必须在template目录下，这里不允许“../”转出template目录。<br>
     * 例如：display('index','article/add') → 系统将解析 template/article/add/index.php 文件<br>
     * 当然$path参数中的 article可以改成其它，默认为当前Module名。
     */
    function __construct($module, $action)
    {
        $this->module = $module;
        $this->action = $action;
    }

    public function display($name, array $var = array())
    {
        if (empty($name)) {
            DD::ShowErr("尚未指定解析的模板名称!");
        }
        $app = DD::C('app');
        if (!isset($app['template'])) {
            $app['template'] = "/view";
        }
        $path = __ROOT__ . $app['template'] . '/' . $this->module . '/';
        $this->file = realpath($path . $name . ".php");
        $this->path = dirname($this->file);
        $this->var = $var;

        if (!file_exists($this->path)) {
            DD::ShowErr('目录不存在：' . DD::C('app.template') . '/' . $this->module . '/');
        }
        if (!file_exists($this->file) || !is_file($this->file) || !is_readable($this->file)) {
            DD::ShowErr('文件不存在或者不可读：' . DD::C('app.template') . '/' . $this->module . '/' . $name);
        }

        $this->assign(md5(__TIME__), $name);
        extract(array_merge($this->assign, $this->var)); //注册变量
        if (!empty($this->layout)) {
            $layout = __ROOT__ . $app['template'] . "/layout/" . $this->layout . ".php";

        }
        if (isset($layout) && file_exists($layout) && is_readable($layout)) {
            require_once $layout;
        } else {
            require_once $this->file;
        }

    }

    public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }

    private function _include($name = '')
    {
        if (empty($name)) {
            $file = $this->file;
        } else {
            $file = $this->path . "/" . $name . ".php";
        }
//        exit($file);
        extract(array_merge($this->assign, $this->var)); //注册变量
//        $tpath = empty($tpath) ? $this->tplpath : $this->tpl . $tpath;
        require_once $file;
    }

}

?>