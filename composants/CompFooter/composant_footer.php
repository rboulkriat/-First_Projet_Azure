<?php
require_once "composants/CompFooter/vue_footer.php";

class CompFooter  {
	private $vue;

	public function __construct() {
		$this->vue = new VueCompFooter();
	}

	public function exec () {
		echo $this->vue->getAffichage();
	}	

}
