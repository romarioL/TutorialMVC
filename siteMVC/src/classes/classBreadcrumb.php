<?php 

namespace Src\classes;

class classBreadcrumb {

	use \Src\traits\TraitURLParser;

	public function addBreadcrumb() {
		$contador = count($this->parserURL());
		$arrayLink[0] = '';
		for($i = 0; $i < $contador; $i ++) {

             $arrayLink[0] .= $this->parserURL()[$i] . '/';

			echo "<a href=' ".DIRPAGE.$arrayLink[0]. " ''>" . $this->parserURL()[$i] . "</a>";

			if($i < $contador - 1) {
                echo ">";
			}
		}
	}
}