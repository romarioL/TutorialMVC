<?php 

namespace App\controller;

class ControllerCarros {

	public function valorCarro($tipo, $motor) {

		$valor = 0;

		if($tipo == 'veiculos' &&  $motor == '1') {
			$valor = "1000,0";
		}elseif($tipo == 'caminhão' && $motor == '2'){
            $valor = "5000,00";
		}

		echo "O tipo é {$tipo} e o valor é {$valor}";


       } 

	}
