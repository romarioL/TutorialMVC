<?php 

namespace App\controller;

use Src\classes\ClassRender;

use Src\interfaces\InterfaceView;

use App\model\classCadastro;

class ControllerCadastro extends classCadastro {

	protected $id;

	protected $nome;

	protected $sexo;

	protected $cidade;

	use \Src\traits\TraitURLParser;

	public function __construct() {


		if(count($this->parserURL()) == 1 ) {


		$render = new ClassRender();

		$render->setTitle("Cadastro");
		$render->setDescription("Essa  é a página de cadastro");
		$render->setKeywords("mvc completo, curso mvc");
		$render->setDir("cadastro");
		$render->renderLayout();

	}

	}

	public function recVariaveis() {
        if(isset($_POST['id'])) {
			$this->id =  $_POST['id'];
			
		}

		if(isset($_POST['nome'])) {
			$this->nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
			
		}

		if(isset($_POST['sexo'])) {
			$this->sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_SPECIAL_CHARS);
			
		}


		if(isset($_POST['cidade'])) {
			$this->cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
			
		}

		
	}

	public function cadastrar() {

		$this->recVariaveis();
		parent::cadastroClientes($this->nome, $this->sexo, $this->cidade);
		echo "Cadastrado com sucesso";

	}

	public function seleciona() {
		$this->recVariaveis();
		$b = parent::selecionaClientes($this->nome, $this->sexo, $this->cidade);

		echo "
		<form name='FormDeletar' id='FormDeletar' action='" .DIRPAGE. "cadastro/deletar' method= 'post'>
		<table border='1'>
		<tr>
		<td>Ação</td>
		<td>Nome</td>
		<td>Sexo</td>
		<td>Cidade</td>
		</tr>
		";

		foreach($b as $c) {
			echo "<table border='1'>
		<tr>
		<td><input type='checkbox' id='id' name='id[]' value='$c[id]'></td>
		<td>$c[nome]</td>
		<td>$c[sexo]</td>
		<td>$c[cidade]</td>
		</tr>";
		}

		echo "</table>
		<input type='submit' value='Deletar'>
		</form>";
	}


	public function deletar() {
		$this->recVariaveis();
		foreach($this->id as $idDeletar) {
           $this->deletarClientes($idDeletar);
		}
		
	}


}