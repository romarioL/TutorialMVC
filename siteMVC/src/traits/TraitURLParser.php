<?php

namespace Src\traits;

trait TraitURLParser {


	public function parserURL() {

		return explode("/", rtrim($_GET['url']), FILTER_SANITIZE_URL);
	}
}