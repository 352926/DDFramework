<?php
/**
 * User: Huangdd <352926@qq.com>
 * Date: 13-1-18
 * Time: 15:38
 */
class Module
{
    public $db;
    public $ajax;
    public $module;
    public $action;
    public $layout;
    public $params = array();
    private $assign = array();

    public function __construct()
    {
        global $app;
        $this->ajax = $app->ajax;
        $this->module = $app->module;
        $this->action = $app->action;
        $this->params = $app->params;
        if (!$this->ajax) {
            header("Content-type:text/html;charset=UTF-8");
        }
    }

    public function display($name = '', $var = array())
    {
        if (empty($name)) {
            $name = $this->action;
        }
        $tpl = new tpl($this->module, $this->action);
        if (!empty($this->assign)) {
            $var = array_merge($this->assign, $var);
        }
        if (!empty($this->layout)) {
            $tpl->layout = $this->layout;
        }
        $tpl->display($name, $var);
    }

    public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }
}
