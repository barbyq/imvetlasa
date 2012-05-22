<?php
include('../../includes/dbconnect.php');
include ('../clases/productos.php');
$dbc = new dbconnect();
$DAO = new productosDAO($dbc->getConnection());
$productos = $DAO->getProductos();
	
?>
<div class="ver">
<h1>Productos:</h1>
<p id="add" class="productos">Agregar Productos</p>

<table border="1">
<?php	
	foreach ($productos as $p)
	{
		echo '<tr id="'.$p->productoId .'"><td>'. $p->producto .'</td>
				<td class="productos"><img class="edit" src="../images/edit.png" alt="editar"/><img class="delete" src="../images/delete.png" alt="borrar"/></td>
		</tr>
		<tr>
			<td class="productos">Laboratorio:'. $p->laboratorio .'</td>
			<td class="productos">Grupo:' .$p->grupo. '</td>
		</tr>
		<tr>
			<td class="productos">Descripción:'.$p->descripcion.'</td>
			<td class="productos"><img src="../images/productos/'. $p->imagen .'" width="113px" height="230px"/></td></td>
		</tr>
		';
	}
?>
</table>
</div>