<?php

// Load my root class

require_once(__ROOT_DIR . '/classes/MyObject.class.php');

class AutoLoader extends MyObject {

public function __construct() {
	spl_autoload_register(array($this, 'load'));
}

// This method will be automatically executed by PHP whenever it encounters
// an unknown class name in the source code

private function load($className) {
	$dirs = array('/classes/', '/model/', '/controller/', '/view/');
	$i=0;
	do {
		$path = __ROOT_DIR . $dirs[$i] . ucfirst($className) .".class.php";
		$i+=1;
	}
	while (!is_readable($path) && $i<count($dirs));
	try {
		require_once($path);
	}
	catch(Exception $e){
		echo $e->getMessage();
	}

}


}

$__LOADER = new AutoLoader();

?>