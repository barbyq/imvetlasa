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
	public function addUsuarios($obj)
	{
		$q = "INSERT INTO usuario VALUES (?, ?)";
		$stmt = $this->dbc->stmt_init();
 		if($stmt->prepare($q)) {
 			$stmt->bind_param('ss', $obj->email, $obj->password);
 			$stmt->execute();
 		}
		$stmt->close();
	}
	public function editUsuarios($obj)
	{
		$q = "UPDATE usuario SET email = ?, password = ? WHERE email = ? ";
		$stmt = $this->dbc->stmt_init();
 		if($stmt->prepare($q)) {
 			$stmt->bind_param('sss', $obj->email, $obj->password, $obj->email);
 			$stmt->execute();
 		}
		$stmt->close();
	}
	public function deleteUsuarios($obj)
	{
		$q = "DELETE usuario WHERE email = ? ";
		$stmt = $this->dbc->stmt_init();
 		if($stmt->prepare($q)) {
 			$stmt->bind_param('s', $obj->email);
 			$stmt->execute();
 		}
		$stmt->close();
	}
	public function getUsuario($id)
	{
		$q = "SELECT * FROM usuario WHERE email = ?";
		$obj = new stdClass;
		$stmt = $this->dbc->stmt_init();
 		if($stmt->prepare($q)) {
 			$stmt->bind_param('s', $id);
 			$stmt->execute();
 			$stmt->bind_result($email, $pass);
 			while ($stmt->fetch())
			{
				$obj->email = $email;
				$obj->password = $pass;
			}
 		}
		$stmt->close();	
		return $obj;
	}
	
	

}

?>