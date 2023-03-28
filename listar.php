<link rel="stylesheet" href="login.css">

<table>
<?php
include('conexion.php');
session_start();

if(isset($_SESSION['rut']))
{
	$usuarioingresado = $_SESSION['rut'];
	echo "<tr><td colspan='2' align='center'><h1>Bienvenido: $usuarioingresado </h1></td></tr>";
}
else
{
	header('location: index.php');
}
?>
<form method="POST">
<tr><td colspan='2' align="center"><input type="submit" value="Cerrar sesión" name="btncerrar" /></td></tr>
</form>

<tr><td colspan="2"><h1>Resultados PAES 2023</h1></td></tr>
<tr>
	<td><label>Nombre</label></td>
        <td><label>Puntaje Marzo</label></td>
	<td><label>Puntaje Abril</label></td>
	<td><label>Puntaje Mayo</label></td>
	<td><label>Puntaje Junio</label></td>
	<td><label>Puntaje Julio</label></td>
	<td><label>Profesor</label></td>
</tr>

<?php 

if(isset($_POST['btncerrar']))
{
	session_destroy();
	header('location: index.php');
}
	
$sql="SELECT rut,nombre,puntaje_marzo,puntaje_abril,puntaje_mayo,puntaje_junio,puntaje_julio,profesor FROM datos WHERE rut = '".$usuarioingresado."'";
$result=mysqli_query($conn,$sql);

while($mostrar=mysqli_fetch_array($result))
{
	
?>
<tr> 
	<td><?php echo $mostrar['nombre'] ?>
	<td><?php echo $mostrar['puntaje_marzo'] ?>
	<td><?php echo $mostrar['puntaje_abril'] ?>
	<td><?php echo $mostrar['puntaje_mayo'] ?>
	<td><?php echo $mostrar['puntaje_junio'] ?>
	<td><?php echo $mostrar['puntaje_julio'] ?>
	<td><?php echo $mostrar['profesor'] ?>

</tr>
<?php
}



?>
</table>
















