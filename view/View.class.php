<?php
	class View extends MyObject{

		protected $controller;
		protected $templateNames;
		protected $args;

		public function __construct($controller, $templateName,$params = array()) {
			parent::__construct();
			$this->controller = $controller;
			$this->params = $params;
			$this->templateNames = array();
			$this->templateNames['head'] = 'head';
			$this->templateNames['top'] = 'top';
			$this->templateNames['menu'] = 'menu';
			$this->templateNames['foot'] = 'foot';
			$this->templateNames['content'] = $templateName;
		}

		public function render() {
			$this->loadTemplate($this->templateNames['head'], $this->args);
			$this->loadTemplate($this->templateNames['top'], $this->args);
			$this->loadTemplate($this->templateNames['menu'], $this->args);
			$this->loadTemplate($this->templateNames['content'], $this->args);
			$this->loadTemplate($this->templateNames['foot'], $this->args);
		}

		public function loadTemplate($name,$args=NULL) {
			$templateFileName = __SITE_PATH . '/templates/'. $name . 'Template.php';
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