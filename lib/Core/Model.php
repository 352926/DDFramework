<?php
/**
 * User: Huangdd <352926@qq.com>
 * Date: 13-1-14
 * Time: 10:15
 */
class Model
{
    private $db;
    private $name;

    function __construct($name = '')
    {
        $this->name = $name;
//        $this->db = new DB();
    }

}
