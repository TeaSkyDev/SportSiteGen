<?php

class Equipe {

	private $_bdd;
	private $_nb;
	private $_data;

	public function __construct($bdd) {
		$this->_bdd = $bdd;

		$query = $bdd->query("select * from TEAM order by Id DESC");
		if($query->rowCount() > 0) {
			$this->_nb = 0;
			while($data = $query->fetch()) {
				$this->_data[$this->_nb] = $data;
				echo $data['Nom'];
				$this->_nb++;
			}
		} 
	}

	public function get_content() {
		return $this->_data;
	}
}

?>