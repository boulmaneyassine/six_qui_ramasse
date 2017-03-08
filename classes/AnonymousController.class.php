<?php
	class AnonymousController extends Controller{

		public function defaultAction($args) {
			$view = new AnonymousView($this);
			$view->render();
		}
	}