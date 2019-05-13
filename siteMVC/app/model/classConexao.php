<?php 

namespace App\model;

class classConexao {

 	public function conexaoDB() {

 		try {
          
          $con = new \PDO("mysql:host=" . HOST . ";dbname=" . DB . "" , "" . USER . "" , "" . PASS . "");

          return $con;


 		}catch(\PDOException $e) {
            return $e->getMessage();
 		}


 	}

}