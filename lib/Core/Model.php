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

    public function GetAll(Array $arr, $debug = false)
    {
        return $this->db->GetAll($arr, $debug);
    }

    public function GetOne($table, $field, $where = '', $debug = false)
    {
        return $this->db->GetAll($table, $field, $where, $debug);
    }

    public function GetRow($table, $fields, $where = '', $debug = false)
    {
        return $this->db->GetRow($table, $fields, $where, $debug);
    }

    public function Delete($table, $where, $safe = true, $commit = true, $debug = false)
    {
        return $this->db->Delete($table, $where, $safe, $commit, $debug);
    }

    public function UpdRow(Array $array, $where = '', $commit = true, $debug = false)
    {
        return $this->db->UpdRow($array, $where, $commit, $debug);
    }

    public function InsRow(Array $data, $commit = true, $debug = false)
    {
        return $this->db->InsRow($data, $commit, $debug);
    }

    public function Query($sql)
    {
        return $this->db->Query($sql);
    }

    public function ExeSql($sql)
    {
        return $this->db->ExeSql($sql);
    }

    public function InsMulRow(Array $array, $commit = true, $debug = false)
    {
        return $this->db->InsMulRow($array, $commit, $debug);
    }
}
