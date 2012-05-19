<?php
include('../../includes/dbconnect.php');
include ('usuarios.php');
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
		echo '<tr><td>'. $u->email .'</td>
				<td class="edit"><td>
				<td class="delete"><td>
		</tr>';
	}
?>
</table>
</div>