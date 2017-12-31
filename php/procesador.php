<?php 
error_reporting(E_ALL ^ E_NOTICE);

$bd = new PDO('mysql:host=localhost;dbname=crud','root','putas-1997');
$row = $bd->query("SELECT * FROM tblproductos")->fetchALL(PDO::FETCH_OBJ);
$contaR= count($row);

$c = $_POST['c'];
$d = $_GET['d']; 
$ld= $_POST['ld']; 
$u= $_POST['u'];

if (isset($c) && $c!='') {
	if ($c=='insertar') {
		$pro = $_POST['producto'];
		$can = $_POST['cantidad'];
		$pre = $_POST['precio'];
		$est=1;
		$bd->query("INSERT INTO tblproductos VALUES(null, '$pro','$can','$pre','$est')");
		$rowt = $bd->query("SELECT * FROM tblproductos")->fetchALL(PDO::FETCH_OBJ);;
		$contaRt= count($rowt);
		if ($contaRt > $contaR) {
			echo 1;
		}else{
			echo 0;
		}
	}
}else if(isset($u) && $u!=''){
	if ($u=='mod') {
		$proUp= $_POST['productou'];
		$canUp= $_POST['cantidadu'];
		$preUp= $_POST['preciou'];
		$idUp= $_POST['idu']; 
		$estu=1;
		$bd->query("UPDATE tblproductos SET productoNOM = '$proUp', productoCAN = '$canUp', productoPRE = '$preUp', productoEST = '$estu' WHERE productoID = '$idUp'");
	}
}else if(isset($ld) && $ld!=''){
	if ($ld=='llevar') {
        $idm=$_POST['sujeto'];
        $up = $bd->query("SELECT productoID, productoNOM, productoCAN, productoPRE FROM tblproductos WHERE productoID='$idm'")->fetch(PDO::FETCH_OBJ);
?>

<h3>Formulario para actualizar:</h3>
<table class="table table-hover table-responsive">
	<tr>
		<th>ID</th>
		<td><input type="text" name="idu" readonly="" class="form-control" value="<?php echo $up->productoID?>"></td>
	</tr>
	<tr>
		<th>Producto</th>
		<td><input  type="text" name="productou" required="" class="form-control" value="<?php echo $up->productoNOM ?>"></td>
	</tr>
	<tr>
		<th>Cantidad</th>
		<td>
			<input type="number" name="cantidadu"  class="form-control" value="<?php echo $up->productoCAN ?>">
		</td>
	</tr>
	<tr>
		<th>Precio</th>
		<td><input type="number" name="preciou"  class="form-control" value="<?php echo $up->productoPRE ?>"></td>
	</tr>
	<tr>
		<td> </td>
		<td><input type="button" onclick="actualizar()" value="Actualizar datos"  class="btn btn-primary"></td>
		<td><input type="button" onclick="ocultarFmod()" class="btn btn-primary" value="Volver"></td>
	</tr>
</table>
<?php
    } 
}else if(isset($d) && $d!=''){ 
	if ($d=='delete') {
		$id=$_POST['id'];
		$bd->query("UPDATE tblproductos SET productoEST = '0' WHERE productoID = '$id'"); 
	}
}else{
$rowth = $bd->query("SELECT productoID, productoNOM, productoCAN, productoPRE FROM tblproductos WHERE productoEST='1'")->fetchALL(PDO::FETCH_OBJ);
?>

<table class="table table-hover table-responsive">
	<tr>
		<th>Id</th><th>Producto</th><th>Cantidad</th><th>Precio</th><th>Editar</th><th>Eliminar</th>
	</tr>
	<?php foreach ($rowth as $rowth): ?>
	<tr >
		<td > <?php echo $rowth->productoID ?> </td>
		<td> <?php echo $rowth->productoNOM ?> </td>	
		<td> <?php echo $rowth->productoCAN ?> </td>	
		<td> <?php echo $rowth->productoPRE ?> </td>
		<td><input type="submit" name="<?php echo $rowth->productoID?>" class="btn btn-info" value="Editar"  onclick="llevarDatos(this.name)"></td>
		<td ><input onclick="eliminar(this.id)" id="<?php echo $rowth->productoID?>"  type="submit" name="eliminar" class="btn btn-danger" value="Eliminar"></td>
	</tr>
	<?php endforeach; ?>
</table>

<?php } ?>


 