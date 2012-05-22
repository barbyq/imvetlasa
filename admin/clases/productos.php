<?php
class productosDAO
{
	private $dbc;
	public function  __construct($connection)
	{
		$this->dbc = $connection;
	}

	public function getProductos()
	{
		$q = "SELECT productoId, producto.nombre as 'producto', laboratorio.nombre as 'laboratorio', grupo.nombre as 'grupo' FROM producto JOIN laboratorio ON laboratorio.laboratorioId = producto.laboratorioId JOIN grupo ON grupo.grupoId = producto.grupoId";		
		$array = array();
		$r = $this->dbc-> query($q);
		while ($obj = $r->fetch_object()) {
			$array[] = $obj;
		}
		return $array;
	}
	
	public function getProductosEspecie($productoId)
	{
		$q = "SELECT especie.especieId, especie.nombre FROM productoEspecie JOIN especie ON productoEspecie.especieId = especie.especieId WHERE productoId = ?";
		$array = array();
		$stmt = $this->dbc->stmt_init();
 		if($stmt->prepare($q)) {
 			$stmt->bind_param('i', $productoId);
 			$stmt->execute();
 			$stmt->bind_result($especieId, $nombre);
 			while ($stmt->fetch())
			{
				$obj = new stdClass;
				$obj->especieId = $especieId;
				$obj->nombre = $nombre;
				$array[] = $obj;
			}
 		}
		$stmt->close();
		return $array;
	}
	
	public function getPresentacionesProducto($productoId)
	{
		$q = "SELECT presentacionId, presentacion FROM presentacion WHERE productoId = ?";
		$array = array();
		$stmt = $this->dbc->stmt_init();
 		if($stmt->prepare($q)) {
 			$stmt->bind_param('i', $productoId);
 			$stmt->execute();
 			$stmt->bind_result($presentacionId, $presentacion);
 			while ($stmt->fetch())
			{
				$obj = new stdClass;
				$obj->presentacionId = $presentacionId;
				$obj->presentacion = $presentacion;
				$array[] = $obj;
			}
 		}
		$stmt->close();
		return $array;
	}
	
	public function getProducto($id)
	{
		$q = "SELECT productoId, producto.nombre as 'producto', laboratorio.nombre as 'laboratorio', grupo.nombre as 'grupo', imagen, descripcion FROM producto JOIN laboratorio ON laboratorio.laboratorioId = producto.laboratorioId JOIN grupo ON grupo.grupoId = producto.grupoId WHERE productoId = ?";
		$obj = new stdClass;
		$stmt = $this->dbc->stmt_init();
 		if($stmt->prepare($q)) {
 			$stmt->bind_param('i', $id);
 			$stmt->execute();
 			$stmt->bind_result($productoId, $producto, $laboratorio, $grupo, $imagen, $descripcion);
 			while ($stmt->fetch())
			{
				$obj->productoId = $productoId;
				$obj->producto = $producto;
				$obj->laboratorio = $laboratorio;
				$obj->grupo = $grupo;
				$obj->imagen = $imagen;
				$obj->descripcion = $descripcion;
			}
 		}
		$stmt->close();	
		return $obj;
	}
	/*
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
	*/
}

?>