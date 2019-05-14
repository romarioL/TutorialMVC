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
		$b = $this->selecionaClientes($this->nome, $this->sexo, $this->cidade);

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
			echo"
		<tr>
		<td><input type='checkbox' id='id' name='id[]' value='$c[id]'><img rel='$c[id]' class='imgRel' src='".DIRIMG."edit.jpeg' alt='Editar'></td>
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

	public function puxaDB($id) {
		$this->recVariaveis();
		$b = $this->selecionarParaMostrar($id);

		

		foreach($b as $c) {

			    $id = $c['id'];
				$nome = $c['nome'];
				$sexo = $c['sexo'];
				$cidade = $c['cidade'];

			}	
		




		 echo "<form name='formCadastro' action='". DIRPAGE ."cadastro/atualizar' id='formCadastro' method='post'>
		 <input type='hidden' name='id' id='Id' value='$id'><br>
	Nome: <input type='text' name='nome' id='nome' value='$nome'><br>
	Sexo: <select  name='sexo' id='sexo' >
	    <option value='$sexo'>$sexo</option>
		<option value='Feminino'>Feminino</option>
		<option value='Masculino'>Masculino</option>
	</select><br>
	Cidade: <input type='text' name='cidade' id='cidade'value='$cidade'><br>

	<input type='submit' value='Atualizar'>
</form>"; 



	}

	public function atualizar() {
		$this->recVariaveis();
	    $b= $this->atualizarClientes($this->id, $this->nome, $this->sexo, $this->cidade);
	}


}