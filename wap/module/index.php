<?php
/**
 * User: Huangdd <352926@qq.com>
 * Date: 13-1-18
 * Time: 下午3:42
 */
class indexClass extends Website
{
    function init()
    {
        $this->layout = 'layout';
    }

    function indexAction()
    {
//        echo "<pre>";
//        print_r(get_included_files());exit;
        $this->website['title'] .= " - 首页";
        $this->display('index');
    }

    function testAction()
    {
//        echo date('w');
        $rs = getWeek();
        print_r($rs);
    }
}
