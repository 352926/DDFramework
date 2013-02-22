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
        $this->display('index');
//        $ary = array(
//            'aa' => 'bb'
//        );
//        $cache = new DDCache();
//        $rs = $cache->set($this->module . '-' . $this->action . '.ary', $ary);
//        $rs = $cache->get($this->module . '-' . $this->action . '.ary');
//        $rs = $cache->del($this->module . '-' . $this->action . '.ary');
//        echo "<hr><pre>";
//        $db = new DB();
//        $rs = $db->Query("Select * from hdd_tb1");
//        $rs = $this->params;
//        print_r(get_included_files());
    }
}
