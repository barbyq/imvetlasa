<?php
include('../../includes/dbconnect.php');
include ('../clases/grupos.php');
$dbc = new dbconnect();
$DAO = new gruposDAO($dbc->getConnection());
$grupos = $DAO->getGrupos();
	
?>
<div class="ver">
<h1>Grupos Farmacológicos:</h1>
<p id="add" class="grupos"><img src="../images/add.png" alt="agregar"/><span class="vert"> Agregar Grupo Farmacológico</span></p>
<table>
	<tr>
		<th>Nombre</th>
		<th>Editar</th>
		<th>Eliminar</th>
	</tr>
<?php	
	foreach ($grupos as $g)
	{
		echo '<tr id="'.$g->grupoId .'"><td>'. $g->nombre .'</td>
				<td class="grupos"><img class="edit" src="../images/edit.png" alt="editar"/></td>
				<td class="grupos"><img class="delete" src="../images/delete.png" alt="borrar"/></td>
		</tr>';
	}
?>
</table>
</div>