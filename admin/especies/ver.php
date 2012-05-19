<?php
include('../../includes/dbconnect.php');
include ('../clases/especies.php');
$dbc = new dbconnect();
$eDAO = new especiesDAO($dbc->getConnection());
$especies = $eDAO->getEspecies();
	
?>
<div class="ver">
<h1>Especies:</h1>
<p id="add" class="especies">Agregar Especies</p>
<table>
	<tr>
		<td>Nombre</td>
		<td>Editar</td>
		<td>Eliminar</td>
	</tr>
<?php	
	foreach ($especies as $e)
	{
		echo '<tr id="'.$e->especieId .'"><td>'. $e->nombre .'</td>
				<td class="especies"><img class="edit" src="images/edit.png" alt="editar"/></td>
				<td class="especies"><img class="delete" src="images/delete.png" alt="borrar"/></td>
		</tr>';
	}
?>
</table>
</div>