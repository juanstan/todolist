<?php
/**
 * Created by PhpStorm.
 * User: Juan
 * Date: 22/01/2017
 * Time: 11:30
 */

namespace library\interfaces;


interface Model
{
    public function selectAll();
    public function selectOne($id);

}