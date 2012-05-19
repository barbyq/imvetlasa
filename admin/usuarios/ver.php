<?php
include('../../includes/dbconnect.php');
include ('../clases/usuarios.php');
$dbc = new dbconnect();
$uDAO = new usuariosDAO($dbc->getConnection());
$usuarios = $uDAO->getUsuarios();
	
?>
<div class="ver">
<h1>Usuarios:</h1>
<p id="add" class="usuarios">Agregar Usuario</p>
<table>
	<tr>
		<td>email</td>
		<td>Editar</td>
		<td>Eliminar</td>
	</tr>
<?php	
	foreach ($usuarios as $u)
	{
		echo '<tr id="'.$u->email .'"><td>'. $u->email .'</td>
				<td class="usuarios"><img class="edit" src="images/edit.png" alt="editar"/></td>
				<td class="usuarios"><img class="delete" src="images/delete.png" alt="borrar"/></td>
		</tr>';
	}
?>
</table>
</div>