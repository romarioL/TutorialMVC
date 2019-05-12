<?php 

namespace App\controller;

use Src\classes\ClassRender;

use Src\interfaces\InterfaceView;

class ControllerHome extends ClassRender implements InterfaceView {
	
	public function __construct() {

		$this->setTitle("Página inicial");
		$this->setDescription("Essa  é a página inicial");
		$this->setKeywords("mvc completo, curso mvc");
		$this->setDir("home/");
		$this->renderLayout();

	}
}