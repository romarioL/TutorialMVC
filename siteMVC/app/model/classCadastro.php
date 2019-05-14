<?php

namespace App\model;

use App\model\classConexao;



class classCadastro extends classConexao {

	private $db;

	protected function cadastroClientes($nome, $sexo, $cidade) {

		$id = 0;

		$this->db = $this->conexaoDB()->prepare("INSERT INTO teste(id, nome, sexo, cidade) VALUES (:id, :nome, :sexo, :cidade)");
        $this->db->bindParam(":id", $id, \PDO::PARAM_INT);
        $this->db->bindParam(":nome", $nome, \PDO::PARAM_STR);
        $this->db->bindParam(":sexo", $sexo,  \PDO::PARAM_STR);
        $this->db->bindParam(":cidade", $cidade,  \PDO::PARAM_STR);

		$this->db->execute();

	

	

	}

	protected function selecionaClientes($nome, $sexo, $cidade) {

		$nome = "%" . $nome . "%";
		$sexo =  "%" . $sexo . "%";
		$cidade = "%" .$cidade . "%";

		

		$bfetch = $this->db = $this->conexaoDB()->prepare("SELECT *  FROM teste  WHERE nome like :nome and sexo like :sexo and cidade like :cidade");
        $bfetch->bindParam(":nome", $nome, \PDO::PARAM_STR);
        $bfetch->bindParam(":sexo", $sexo,  \PDO::PARAM_STR);
        $bfetch->bindParam(":cidade", $cidade,  \PDO::PARAM_STR);

		$bfetch->execute();

		$i = 0;

		while($fetch = $bfetch->fetch(\PDO::FETCH_ASSOC)) {

			$array[$i] = ['id' => $fetch['id'], 'nome' => $fetch['nome'], 'sexo' => $fetch['sexo'], 'cidade' => $fetch['cidade']];

			$i++;

			 return $array;

		}

	

	

	}

	protected function deletarClientes($id) {
         $bfetch = $this->db = $this->conexaoDB()->prepare("DELETE FROM teste WHERE id = :id");
         $bfetch->bindParam(":id", $id, \PDO::PARAM_INT);
         $bfetch->execute();
	}


	protected function selecionarParaMostrar($id) {

		$bfetch = $this->db = $this->conexaoDB()->prepare("SELECT id, nome, sexo, cidade FROM teste where id = :id");
		$bfetch->bindParam(":id", $id, \PDO::PARAM_INT);
        $bfetch->execute();

        $i = 0;

        while($fetch = $bfetch->fetch(\PDO::FETCH_ASSOC)) {

			$array[$i] = ['id' => $fetch['id'], 'nome' => $fetch['nome'], 'sexo' => $fetch['sexo'], 'cidade' => $fetch['cidade']];

			$i++;

			 return $array;

		}

	}

	protected function atualizarClientes($id, $nome, $sexo, $cidade) {

		$bfetch = $this->db = $this->conexaoDB()->prepare("UPDATE teste SET nome=:nome, sexo=:sexo, cidade=:cidade WHERE id=:id");
	    $bfetch->bindParam(":id", $id, \PDO::PARAM_INT);
        $bfetch->bindParam(":nome", $nome, \PDO::PARAM_STR);
        $bfetch->bindParam(":sexo", $sexo,  \PDO::PARAM_STR);
        $bfetch->bindParam(":cidade", $cidade,  \PDO::PARAM_STR);
       
      

         
	}

	





}