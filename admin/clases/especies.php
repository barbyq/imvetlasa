<?php
class especiesDAO
{
	private $dbc;
	public function  __construct($connection)
	{
		$this->dbc = $connection;
	}

	public function getEspecies()
	{
		$q = "SELECT * FROM especie";		
		$array = array();
		$r = $this->dbc-> query($q);
		while ($obj = $r->fetch_object()) {
			$array[] = $obj;
		}
		return $array;
	}
	public function addEspecies($obj)
	{
		$q = "INSERT INTO especie (nombre) VALUES (?)";
		$stmt = $this->dbc->stmt_init();
 		if($stmt->prepare($q)) {
 			$stmt->bind_param('s', $obj->nombre);
 			$stmt->execute();
 		}
		$stmt->close();
		
	}
	
	public function editEspecies($obj)
	{
		$q = "UPDATE especie SET nombre = ? WHERE especieId = ? ";
		$stmt = $this->dbc->stmt_init();
 		if($stmt->prepare($q)) {
 			$stmt->bind_param('si', $obj->nombre, $obj->especieId);
 			$stmt->execute();
 		}
		$stmt->close();
	}
	public function deleteEspecies($obj)
	{
		$q = "DELETE FROM especie WHERE especieId = ? ";
		$stmt = $this->dbc->stmt_init();
 		if($stmt->prepare($q)) {
 			$stmt->bind_param('i', $obj->id);
 			$stmt->execute();
 		}
		$stmt->close();
	}
	public function getEspecie($id)
	{
		$q = "SELECT * FROM especie WHERE especieId = ?";
		$obj = new stdClass;
		$stmt = $this->dbc->stmt_init();
 		if($stmt->prepare($q)) {
 			$stmt->bind_param('i', $id);
 			$stmt->execute();
 			$stmt->bind_result($especieId, $nombre);
 			while ($stmt->fetch())
			{
				$obj->especieId = $especieId;
				$obj->nombre = $nombre;
			}
 		}
		$stmt->close();	
		return $obj;
	}
}

?>