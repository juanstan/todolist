<?php
/**
 * Created by PhpStorm.
 * User: Juan
 * Date: 22/01/2017
 * Time: 05:36
 */
/** Check if environment is development and display errors **/
function setReporting()
{
    if (DEVELOPMENT_ENVIRONMENT == true) {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        //mysqli_report(MYSQLI_REPORT_ALL);
    } else {
        error_reporting(E_ALL);
        ini_set('display_errors','Off');
        ini_set('log_errors', 'On');
        ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
    }
}

spl_autoload_register(function($className)
{
    $className=str_replace("\\","/",$className);
    $class=ROOT . DS . "{$className}.php";
    include_once($class);
});