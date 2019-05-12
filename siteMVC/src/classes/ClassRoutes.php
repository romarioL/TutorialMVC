<?php 

namespace Src\classes;

use Src\traits\TraitURLParser;

class ClassRoutes {

   use TraitURLParser;

   private $rota;


   public function getRota() {
   	  $url = $this->parserURL();

   	  $i = $url[0];

   	  $this->rota = array(
         "" => "ControllerHome",
         "home" => "ControllerHome",
         "sitemap" =>"ControllerSitemap",
         "carros" => "ControllerCarros"
   	  );

   	  if(array_key_exists($i, $this->rota)) {

   	  	if(file_exists(DIRREQ . "app/controller/{$this->rota[$i]}.php")) {
              return $this->rota[$i];
   	  	}else {
   	  		return "ControllerHome";
   	  	}

   	  }else {
   	  	return "Controller404";
   	  }

   	  
   }
}