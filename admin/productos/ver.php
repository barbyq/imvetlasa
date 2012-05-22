<?php
include('../../includes/dbconnect.php');
include ('../clases/productos.php');
$dbc = new dbconnect();
$DAO = new productosDAO($dbc->getConnection());
$productos = $DAO->getProductos();
	
?>
<div class="ver">
<h1>Productos:</h1>
<p id="add" class="productos"><img src="../images/add.png" alt="agregar"/><span class="vert"> Agregar Productos</span></p>

<table>
	<tr>
		<th>Nombre</th>
		<th>Laboratorio</th>
		<th>Grupo</th>
		<th>Editar</th>
		<th>Eliminar</th>
	</tr>

<?php	
	foreach ($productos as $p)
	{
		echo '<tr id="'.$p->productoId .'"><td>'. $p->producto .'</td>
				<td>'. $p->laboratorio  .'</td>
				<td>'. $p->grupo .'</td>
				<td class="productos"><img class="edit" src="../images/edit.png" alt="editar"/></td>
				<td class="productos"><img class="delete" src="../images/delete.png" alt="borrar"/></td>
		</tr>';
	}
?>
</table>
</div>