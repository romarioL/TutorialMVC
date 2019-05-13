<?php 

namespace App\controller;

use Src\classes\ClassRender;

use Src\interfaces\InterfaceView;

class ControllerContato extends ClassRender implements InterfaceView {

	public function __construct() {

		$this->setTitle("Página Contato");
		$this->setDescription("Essa  é a página de contato");
		$this->setKeywords("mvc completo, curso mvc");
		$this->setDir("contato");
		$this->renderLayout();

	}

}