<?php
/**
 * Created by PhpStorm.
 * User: Juan
 * Date: 21/01/2017
 * Time: 04:57
 */

namespace app\controllers;
use app\models\Task as TaskModel;


class TaskController extends \library\Controller {

    public function __construct($controller, $action, TaskModel $model)
    {
        parent::__construct($controller, $action, $model);
    }

    function view($id = null,$name = null)
    {
        $this->set('title', $name. ' - My Todo List App');
        $this->set('task', $this->_model->selectOne($id)[0]);
    }

    function all()
    {
        $this->set('title', 'All Items - My Todo List App');
        $this->set('tasks', $this->_model->selectAll());
    }

    function add()
    {
        $task = $_POST['task'];
        $this->set('title', 'Success - My Todo List App');
        $this->set('todo', $this->_model->insert($this->_model->_table, ['task'=>$task], ['%s']));
    }

    function delete($id = null) {
        $this->set('title','Success - My Todo List App');
        $this->set('todo',$this->_model->delete($this->_model->_table, (int)$id, $this->_model->_primaryKey));
    }


}