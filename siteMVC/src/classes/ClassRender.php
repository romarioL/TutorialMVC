<?php

namespace Src\classes;

class ClassRender {

	private $dir;

	private $title;

	private $description;

	private $keywords;

	public function getDir() {
		return $this->dir;

	}

	public function setDir($dir) {
		$this->dir = $dir;
	}

	public function getTitle() {
		return $this->title;
	}

	public function setTitle($title) {
		$this->title = $title;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

	public function getKeywords() {
         return $this->keywords;
	}

	public function setKeywords($keywords) {
		$this->keywords = $keywords;
	}

   public function renderLayout() {

   	   include_once(DIRREQ . "app/view/layout.php");

   }

   public function addHead() {

   }

   public function addMain() {

   }


   public function addFooter() {

   }

}