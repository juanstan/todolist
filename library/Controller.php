<?php
/**
 * Created by PhpStorm.
 * User: Juan
 * Date: 21/01/2017
 * Time: 03:50
 */
namespace library;


class Controller
{
    protected $_model;
    protected $_controller;
    protected $_action;
    protected $_template;

    function __construct($controller, $action, interfaces\Model $model = null)
    {
        $this->_action = $action;
        $this->_model = $model ?: false;
        $this->render = 1;
        $this->_template = new Template($controller,$action);

    }

    function set($name,$value) {
        $this->_template->set($name,$value);
    }

    function __destruct() {
        $this->_template->render();
    }

}