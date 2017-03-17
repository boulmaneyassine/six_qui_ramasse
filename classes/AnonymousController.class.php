<?php
	class AnonymousController extends Controller{

		public function __construct($request){
		parent::__construct($request);
		if (isset($_POST['inscLogin']) && isset($_POST['inscPassword'])){
			return static::validateInscription($_POST);
		}
		}

		public function defaultAction() {
			$view = new AnonymousView($this);
			$view->render();
		}

		public function inscription(){
			$view = new InscriptionView($this);
			$view->render();
		}

		public function validateInscription($args) {
			$login = $args['inscLogin'];
			if(User::isLoginUsed($login)) {
				$view = new View($this,'inscription');
				$view->setArg('inscErrorText','This login is already used');
				$view->render();
			} 
			else {
				$password = $args['inscPassword'];
				$nom = $args['nom'];
				$prenom = $args['prenom'];
				$mail = $args['mail'];
				$user = User::create($login, $password);
				if(!isset($user)) {
					$view = new View($this,'inscription');
					$view->setArg('inscErrorText', 'Cannot complete inscription');
					$view->render();
				} 
				else {
					$newRequest = new Request();
					$newRequest->write('controller','user');
					$newRequest->write('user',$user->id());
					Dispatcher::getCurrentDispatcher()->dispatch($newRequest);
				}
			}
		}
	}