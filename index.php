<?php
include_once 'Crud.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="Style.css" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<center>
<br />
<div id="form">
<form class="form-horizontal" method="post">
<fieldset>
<div class="form-group">
    <label class="col-md-4 control-label" for="comments">Serienummer</label>
    <div class="col-md-4">
        <td><input type="text" name="Serienummer" placeholder="Serienummer" value="<?php if(isset($_GET['edit'])) echo $getROW['Serienummer'];  ?>" /></td>
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label" for="comments">Product</label>
    <div class="col-md-4">
        <td><input type="text" name="Product" placeholder="Product" value="<?php if(isset($_GET['edit'])) echo $getROW['Product'];  ?>" /></td>
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label" for="comments">productiedatum</label>
    <div class="col-md-4">
        <td><input type="date" name="Productiedatum" placeholder="Productiedatum" value="<?php if(isset($_GET['edit'])) echo $getROW['Productiedatum'];  ?>" /></td>
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label" for="comments">Opmerkingen</label>
    <div class="col-md-4">
        <td><textarea type="text" name="Opmerking" placeholder="Opmerking" value="<?php if(isset($_GET['edit'])) echo $getROW['Opmerking'];  ?>"></textarea></td>
    </div>
</div>
<?php
if(isset($_GET['edit']))
{
 ?>
 <button type="submit" name="update">update</button>
 <?php
}
else
{
 ?>
 <button type="submit" name="save">save</button>
 <?php
}
?>
</fieldset>
</form>

<br /><br />

<table width="100%" border="1" cellpadding="15" align="center">
<?php
$res = $MySQLiconn->query("SELECT * FROM Producten");
while($row=$res->fetch_array())
{
 ?>
    <tr>
    <td><?php echo $row['Serienummer']; ?></td>
    <td><?php echo $row['Product']; ?></td>
    <td><?php echo $row['Productiedatum']; ?></td>
    <td><?php echo $row['Opmerking']; ?></td>
    <td><button id="myBtn" data-toggle="modal" data-target="#myModal">edit</button></td>
    <td><a href="?del=<?php echo $row['Serienummer']; ?>" onclick="return confirm('sure to delete !'); " >delete</a></td>
    </tr>
    <?php
}
?>
<div id="myModal" class="modal">

  <div class="modal-content">
    <span class="close">&times;</span>
    <div class="container">
     <div class="row" style="margin: auto">

         <div class="panel-body">
    	  <label>Serienummer :</label><input type='text' class='form-control'  placeholder="Serienummer"  />
          <label>Product : </label><input type='text' class='form-control'  placeholder="Product" />
    	  <label>Productiedatum: </label><input type='text' class='form-control'  placeholder="Productiedatum" />
    	  <label>Opmerking : </label><input type='text' class='form-control'  placeholder="Opmerking" />
      </div>
     </div>
    </div>

  </div>

</div>

</table>
</div>
</center>
</body>
</html>
