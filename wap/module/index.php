<?php
/**
 * User: Huangdd <352926@qq.com>
 * Date: 13-1-18
 * Time: 下午3:42
 */
class indexClass extends Module
{
    function init()
    {
        $this->layout = 'layout';
    }

    function indexAction()
    {
        $this->display('index');
    }
}