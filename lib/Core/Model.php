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
        $mysql = DD::C('mysql');
        if ($mysql) {
            $this->name = $name;
            $this->db = DB::getInstance();
        }
    }

    public function get($title)
    {
        return $this->db->GetOne($this->name, $title, "id=16");
    }

    public function GetAll(Array $arr, $debug = false)
    {
        return $this->db->GetAll($arr, $debug);
    }

    public function GetOne($table, $field, $where = '', $debug = false)
    {
        return $this->db->GetAll($table, $field, $where, $debug);
    }

    public function Query($sql)
    {
        return $this->db->Query($sql);
    }

    public function ExeSql($sql)
    {
        return $this->db->ExeSql($sql);
    }
}
