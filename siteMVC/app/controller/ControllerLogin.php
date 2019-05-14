<?php 

namespace App\controller;

use Src\classes\ClassRender;

use \App\model\classLogin;

class ControllerLogin extends classLogin {

	use \Src\traits\TraitURLParser;


public function __construct() {

	if(count($this->parserURl()) == 1) {
        $render = new ClassRender();
        $render->setTitle('Login');
        $render->setDescription(' Tela de login');
        $render->setKeywords('Mvc, login');
        $render->setDir('login');
        $render->renderLayout();
	}
}

public function validar() {
	$validacao = $this->validarUsuario($_POST['usuario'], $_POST['senha']);
	if($validacao == true) {
		echo "Login efetuado";
	}else {
		echo "Não foi possível fazer login";
	}
}
	

	}