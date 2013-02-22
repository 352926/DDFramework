<?php
/**
 * User: Huangdd <352926@qq.com>
 * Date: 13-2-22
 * Time: 下午3:39
 */
class monthClass extends Website
{
    function init()
    {
        $this->layout = "layout";
    }

    function indexAction()
    {
        $wk = getWeek();
        $today = strtotime(date("Y-m-d"));
        $find = false;
        foreach ($wk as $k => $v) {
//            echo "{" . date("Y-m-d", $v['end']) . "}!";
            if (!$find) {
                if ($v['end'] > $today) {
                    $wk[$k]['end'] = $today;
                    $find = true;
                }
            } else {
                unset($wk[$k]);
            }
        }
        $wk = array_reverse($wk);
        $this->assign('weekList', $wk);
        $this->display();
    }
}
