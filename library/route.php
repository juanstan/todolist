<?php

namespace library;

Class Route {

    public $url,$default,$queryString;


    function __construct()
    {
        $this->queryString = [];
        $this->url = isset($_GET['url']) ? $_GET['url'] : false;
        $this->default = [
            'controller'    =>  'task',
            'action'        =>  'all'
        ];
    }

    /** Routing from the config file **/
    function routeURL()
    {
        if (is_array($this->url)){
            foreach ($this->url as $pattern => $result ) {
                if ( preg_match( $pattern, $this->url ) ) {
                    return preg_replace( $pattern, $result, $this->url );
                }
            }
        }
        return ($this->url);
    }

    /** Main Call Function **/
    function call()
    {
        if (!$this->url) {
            $controller = $this->default['controller'];
            $action = $this->default['action'];
        } else {
            $this->url = $this->routeURL($this->url);
            $urlArray = explode("/",$this->url);
            $controller = $urlArray[0];
            array_shift($urlArray);
            if (isset($urlArray[0])) {
                $action = $urlArray[0];
                array_shift($urlArray);
            }
            $this->queryString = $urlArray;
        }

        $controllerName = '\\app\\controllers\\' .ucfirst($controller).'Controller';
        $model = '\\app\\models\\' .ucfirst($controller);
        $model = class_exists($model) ? new $model : null;

        $dispatch = new $controllerName($controller, $action, $model);

        if ((int)method_exists($controllerName, $action)) {
            call_user_func_array(array($dispatch,$action),$this->queryString);
        }

    }


}