<?php
/**
 * User: Huangdd <352926@qq.com>
 * Date: 13-1-18
 * Time: 下午3:42
 */
class indexClass extends Module
{
    function indexAction()
    {
        echo 'Hello World!';
        echo "<hr><pre>";
        $db = new Model();
//        $rs = $db->Query("Select * from hdd_tb1");
        $rs = $this->params;
        print_r($rs);
    }
}
