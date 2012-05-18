<?php
include('../../includes/dbconnect.php');
include ('usuarios.php');
$dbc = new dbconnect();
$uDAO = new usuariosDAO($dbc->getConnection());
$usuarios = $uDAO->getUsuarios();
	
?>
<div class="ver">
<h1>Usuarios:</h1>
<table>
	<tr>
		<td>email</td>	
	</tr>
<?php	
	foreach ($usuarios as $u)
	{
		echo '<tr><td>'. $u->email .'</td></tr>';
	}
?>
</table>
</div>