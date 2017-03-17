<?php
abstract class Controller extends MyObject{
	protected $request;
	protected $action;
	protected $methodName;

	public function __construct($request){
		$this->request = $request;
	}

	public function execute(){
		$this -> methodName = $this -> request -> getActionName($this -> request);
		// if(!method_exists($this, $this -> methodName))
		// 	throw new Exception("$action" . $this-> action."doesn't exist on controller");

		$methodName = $this -> methodName;
		return $this -> $methodName();
	}

	abstract function defaultAction();

	abstract function inscription();
	}