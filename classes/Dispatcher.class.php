<?php 

class Dispatcher extends MyObject{

	public static function dispatch($request){
		return static::dispatchToController($request->getControllerName($request),$request);
	}
	
	public static function dispatchToController($controllerName, $request){
		$controllerClassName = ucfirst($controllerName)."Controller";

		if(!class_exists($controllerClassName))
			throw new Exception("$controllerName doesn't exist");

		return new $controllerClassName($request);
			
	}
}
?>