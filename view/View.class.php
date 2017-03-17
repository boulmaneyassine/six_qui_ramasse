<?php
	class View extends MyObject{

		protected $templateNames;
		protected $args;

		public function __construct($controller, $templateName, $args = array()) {
			$this->controller = $controller;
			$this->args = $args;
			$this->templateNames = array();
			$this->templateNames['header'] = 'header';
			$this->templateNames['top'] = 'top';
			$this->templateNames['menu'] = 'menu';
			$this->templateNames['footer'] = 'footer';
			$this->templateNames['content'] = $templateName;
		}

		public function render() {
			$this->loadTemplate($this->templateNames['header'], $this->args);
			$this->loadTemplate($this->templateNames['top'], $this->args);
			$this->loadTemplate($this->templateNames['menu'], $this->args);
			$this->loadTemplate($this->templateNames['content'], $this->args);
			$this->loadTemplate($this->templateNames['footer'], $this->args);
		}

		public function setArg($key, $val){
			$this->args[$key]=$val;
		}

		public function loadTemplate($name,$args=NULL) {
			$templateFileName = __ROOT_DIR . '/templates/'. $name . 'Template.php';
			if(is_readable($templateFileName)) {
				if(isset($args))
				foreach($args as $key => $value)
					$$key = $value;
				require_once($templateFileName);
			}
			else
			throw new Exception('undefined template "' . $name .'"');
			}


	}
	?>