<?php
class gruposDAO
{
	private $dbc;
	public function  __construct($connection)
	{
		$this->dbc = $connection;
	}

	public function getGrupos()
	{
		$q = "SELECT * FROM grupo";		
		$array = array();
		$r = $this->dbc-> query($q);
		while ($obj = $r->fetch_object()) {
			$array[] = $obj;
		}
		return $array;
	}
	public function addGrupos($obj)
	{
		$q = "INSERT INTO grupo (nombre) VALUES (?)";
		$stmt = $this->dbc->stmt_init();
 		if($stmt->prepare($q)) {
 			$stmt->bind_param('s', $obj->nombre);
 			$stmt->execute();
 		}
		$stmt->close();
		
	}
	
	public function editGrupos($obj)
	{
		$q = "UPDATE grupo SET nombre = ? WHERE grupoId = ? ";
		$stmt = $this->dbc->stmt_init();
 		if($stmt->prepare($q)) {
 			$stmt->bind_param('si', $obj->nombre, $obj->grupoId);
 			$stmt->execute();
 		}
		$stmt->close();
	}
	public function deleteGrupos($obj)
	{
		$q = "DELETE FROM grupo WHERE grupoId = ? ";
		$stmt = $this->dbc->stmt_init();
 		if($stmt->prepare($q)) {
 			$stmt->bind_param('i', $obj->id);
 			$stmt->execute();
 		}
		$stmt->close();
	}
	public function getGrupo($id)
	{
		$q = "SELECT * FROM grupo WHERE grupoId = ?";
		$obj = new stdClass;
		$stmt = $this->dbc->stmt_init();
 		if($stmt->prepare($q)) {
 			$stmt->bind_param('i', $id);
 			$stmt->execute();
 			$stmt->bind_result($grupoId, $nombre);
 			while ($stmt->fetch())
			{
				$obj->grupoId = $grupoId;
				$obj->nombre = $nombre;
			}
 		}
		$stmt->close();	
		return $obj;
	}
}

?>