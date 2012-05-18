<?php
class usuariosDAO
{
	private $dbc;
	public function  __construct($connection)
	{
		$this->dbc = $connection;
	}

	public function getUsuarios()
	{
		$q = "SELECT * FROM usuario";		
		$array = array();
		$r = $this->dbc-> query($q);
		while ($obj = $r->fetch_object()) {
			$array[] = $obj;
		}
		return $array;
	}

}

?>