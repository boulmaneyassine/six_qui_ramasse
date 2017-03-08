<?php

class Request extends MyObject{


	private static $instance;

	public static function getCurrentRequest(){
		if (!isset(static::$instance)) {
            static::$instance = new self();
        }

        return static::$instance;
    }

	public function getControllerName($request){
		if (isset($_GET['controller'])){
			return $_GET['controller'];
		}
		else {
			return 'Anonymous';
		}
	}

	public function getActionName($request){

	if (isset($_GET['action'])){
			return $_GET['action'];
		}
		else {
			return 'defaultAction';
		}
	}

}
?>