<?php
/**
 * Created by PhpStorm.
 * User: Juan
 * Date: 21/01/2017
 * Time: 03:51
 */

namespace library;


class Model extends ORMysql implements interfaces\Model
{

    public function selectAll()
    {
        return $this->query("SELECT * FROM {$this->_table}");
    }

    public function selectOne($id)
    {
        return $this->select("SELECT * FROM {$this->_table} WHERE {$this->_primaryKey}= ?", [(int)$id], ['%d']);
    }

    function __destruct()
    {

    }
}