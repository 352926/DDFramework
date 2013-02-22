<?php
/**
 * User: Huangdd <352926@qq.com>
 * Date: 13-2-22
 * Time: 上午10:51
 */
function getWeek($date = 0)
{
    if (!$date) {
        $date = time();
    }
    $days = date('t', $date);
    $rs = array();
    for ($i = 1; $i <= $days; $i++) {
        if (date('w', strtotime(date("Y-m-", $date) . $i)) == 6) {
            if ($i == 1) {
                $rs[] = array(
                    "start" => strtotime(date("Y-m-", $date) . $i),
                    "end" => strtotime(date("Y-m-", $date) . $i)
                );
            } elseif ($i > 1 && $i < $days) {
                $rs[] = array(
                    "start" => strtotime(date("Y-m-", $date) . (($i - 7) > 0 ? ($i - 6) : '1')),
                    "end" => strtotime(date("Y-m-", $date) . $i)
                );
            }
        } elseif ($i == $days) {
            $j = $i;
            while (1) {
                if (date('w', strtotime(date("Y-m-", $date) . $j)) == 0 && $j > 0) {
                    break;
                }
                $j--;
            }
            $rs[] = array(
                "start" => strtotime(date("Y-m-", $date) . $j),
                "end" => strtotime(date("Y-m-", $date) . $i)
            );
        }
    }
    return $rs;
}