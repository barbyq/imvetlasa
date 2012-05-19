<?php
class laboratoriosDAO
{
	private $dbc;
	public function  __construct($connection)
	{
		$this->dbc = $connection;
	}

	public function getLaboratorios()
	{
		$q = "SELECT * FROM laboratorio";		
		$array = array();
		$r = $this->dbc-> query($q);
		while ($obj = $r->fetch_object()) {
			$array[] = $obj;
		}
		return $array;
	}
	public function addLaboratorios($obj)
	{
		$q = "INSERT INTO laboratorio (nombre) VALUES (?)";
		$stmt = $this->dbc->stmt_init();
 		if($stmt->prepare($q)) {
 			$stmt->bind_param('s', $obj->nombre);
 			$stmt->execute();
 		}
		$stmt->close();
		
	}
	
	public function editLaboratorios($obj)
	{
		$q = "UPDATE laboratorio SET nombre = ? WHERE laboratorioId = ? ";
		$stmt = $this->dbc->stmt_init();
 		if($stmt->prepare($q)) {
 			$stmt->bind_param('si', $obj->nombre, $obj->laboratorioId);
 			$stmt->execute();
 		}
		$stmt->close();
		return $this->dbc->error;
	}
	public function deleteLaboratorios($obj)
	{
		$q = "DELETE FROM laboratorio WHERE laboratorioId = ? ";
		$stmt = $this->dbc->stmt_init();
 		if($stmt->prepare($q)) {
 			$stmt->bind_param('i', $obj->id);
 			$stmt->execute();
 		}
		$stmt->close();
	}
	public function getLaboratorio($id)
	{
		$q = "SELECT * FROM laboratorio WHERE laboratorioId = ?";
		$obj = new stdClass;
		$stmt = $this->dbc->stmt_init();
 		if($stmt->prepare($q)) {
 			$stmt->bind_param('i', $id);
 			$stmt->execute();
 			$stmt->bind_result($laboratorioId, $nombre);
 			while ($stmt->fetch())
			{
				$obj->laboratorioId = $laboratorioId;
				$obj->nombre = $nombre;
			}
 		}
		$stmt->close();	
		return $obj;
	}
}

?>