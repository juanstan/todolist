<?php
/**
 * Created by PhpStorm.
 * User: Juan
 * Date: 22/01/2017
 * Time: 06:49
 */

namespace app\models;


class Task extends \library\Model
{
    public $_table;
    public $_primaryKey;

    public function __construct()
    {
        $this->_table = 'tasks';
        $this->_primaryKey = 'id_task';
    }

}