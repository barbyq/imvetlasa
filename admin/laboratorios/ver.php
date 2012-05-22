<?php
include('../../includes/dbconnect.php');
include ('../clases/laboratorios.php');
$dbc = new dbconnect();
$DAO = new laboratoriosDAO($dbc->getConnection());
$laboratorios = $DAO->getLaboratorios();
	
?>
<div class="ver">
<h1>Laboratorios:</h1>
<p id="add" class="laboratorios"><img src="../images/add.png" alt="agregar"/><span class="vert"> Agregar Laboratorios</span></p>
<table>
	<tr>
		<th>Nombre</th>
		<th>Editar</th>
		<th>Eliminar</th>
	</tr>
<?php	
	foreach ($laboratorios as $l)
	{
		echo '<tr id="'.$l->laboratorioId .'"><td>'. $l->nombre .'</td>
				<td class="laboratorios"><img class="edit" src="../images/edit.png" alt="editar"/></td>
				<td class="laboratorios"><img class="delete" src="../images/delete.png" alt="borrar"/></td>
		</tr>';
	}
?>
</table>
</div>