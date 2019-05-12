<?php


 namespace App;

 use Src\classes\ClassRoutes;

 class Dispatch extends ClassRoutes {

 	private $method;

 	private $param = [];

 	private $obj; 


     
     public function __construct() {

     	self::addController();

     }

     public function setMethod($method) {
          $this->method = $method;
     }

     protected function getMethod() {
        return $this->method;
     }

     public function setParam($param) {
          $this->param = $param;
     }

     protected function getParam() {
        return $this->param;
     }



     private function addController() {
         $rotaController = $this->getRota();
         $nameS = "App\\controller\\${rotaController}";

         $this->obj = new $nameS;

         if(isset($this->parserURL()[1])) {
            self::addMethod();
         }
     }

     private function  addMethod() {
      
        if(method_exists($this->obj, $this->parserURL()[1])) {
            $this->setMethod("{$this->parserURL()[1]}");
            self::addParam();
            call_user_func_array([$this->obj, $this->getMethod()], $this->getParam());
        }

     }

     private function  addParam() {

        $contArray = count($this->parserURL());

        if($contArray > 2) {
           foreach($this->parserURL() as $key => $value) {
             if($key > 1) {
                $this->setParam($this->param += [$key => $value]);
             }
           }
        }


     }
 }

