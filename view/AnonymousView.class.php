<?php 
class AnonymousView extends View{

		protected $templateNames;
		protected $args;

	public function __construct($controller, $args = array()) {
		parent::__construct($controller, 'anonymousContent', $args);
		}

}