<?php 
class InscriptionView extends View{

		protected $templateNames;
		protected $args;

	public function __construct($controller, $args = array()) {
		parent::__construct($controller, 'inscription', $args);
		}


}