<?php
include('../../includes/dbconnect.php');
include ('../clases/laboratorios.php');
$dbc = new dbconnect();
$lDAO = new laboratoriosDAO($dbc->getConnection());
$laboratorios = $lDAO->getLaboratorios();
	
?>
<div class="ver">
<h1>Laboratorios:</h1>
<p id="add" class="laboratorios">Agregar Laboratorios</p>
<table>
	<tr>
		<td>Nombre</td>
		<td>Editar</td>
		<td>Eliminar</td>
	</tr>
<?php	
	foreach ($laboratorios as $l)
	{
		echo '<tr id="'.$l->laboratorioId .'"><td>'. $l->nombre .'</td>
				<td class="laboratorios"><img class="edit" src="images/edit.png" alt="editar"/></td>
				<td class="laboratorios"><img class="delete" src="images/delete.png" alt="borrar"/></td>
		</tr>';
	}
?>
</table>
</div>