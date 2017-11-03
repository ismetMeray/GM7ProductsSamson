<?php
include_once 'Crud.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="views/Style.css" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<head>

</head>
<body>
<br/>
<div class="Stuck">
<div>
<form id="form" class="form-horizontal" method="post">
<fieldset>
<div class="form-group">
    <label class="col-md-4 control-label" for="Serienummer">Serienummer</label>
    <div class="col-md-4">
        <td><input class="form-control" type="text" name="Serienummer" placeholder="Serienummer" value="<?php if(isset($_GET['edit'])) echo $getROW['Serienummer'];  ?>" /></td>
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label" for="ProductNaam">ProductNaam</label>
    <div class="col-md-4">
        <td><input class="form-control" type="text" name="ProductNaam" placeholder="ProductNaam" value="<?php if(isset($_GET['edit'])) echo $getROW['ProductNaam'];  ?>" /></td>
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label" for="Productiedatum">productiedatum</label>
    <div class="col-md-4">
        <td><input class="form-control" type="date" name="Productiedatum" placeholder="Productiedatum" value="<?php if(isset($_GET['edit'])) echo $getROW['Productiedatum'];  ?>" /></td>
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label" for="Productiedatum">Product of Gereedschap</label>
    <div class="col-md-4">
            <input name='Type' type='radio' value="<?php if(isset($_GET['edit'])) echo $getROW['Product'] ?> Product"/> Product
            <input name='Type' type='radio' value="<?php if(isset($_GET['edit'])) echo $getROW['Gereedschap']?> Gereedschap"/> Gereedschap
        </div>
    </div>
<div class="form-group">
    <label class="col-md-4 control-label" for="comments">Opmerkingen</label>
    <div class="col-md-4">
        <td><input id="grootteinput" class="form-control" type="text" name="Opmerking" placeholder="Opmerking" value="<?php if(isset($_GET['edit'])) echo $getROW['Opmerking'];  ?>"/></td>
    </div>
</div>
<?php
if(isset($_GET['edit'])){
 ?>
 <p align="center">
 <button class="btn btn-primary" type="submit" name="update">Wijzig</button>
 </P>
 <?php
}
 else{
 ?>
 <p align="center">
 <button class="btn btn-primary" type="submit" name="save">save</button>
 </p>
 <?php
}
?>
</fieldset>
</form>
</div>
</div>


<div style="float:left; width:50%;">
<form>
<table width="100%" border="1" cellpadding="15" align="center">
<?php
$result = $MySQLiconn->query("SELECT * FROM Producten");
$i = 0;
while($row=$result->fetch_array())
{
    $i++;
 ?>
    <tr>
    <td class="muishover" id="serial<?php echo $i; ?>"> <?php echo $row['Serienummer']; ?> </td>
    <td class="muishover" id="productName<?php echo $i; ?>"> <?php echo $row['ProductNaam']; ?></td>
    <td class="muishover" id="date<?php echo $i; ?>"> <?php echo $row['Productiedatum']; ?> </td>
    <td class="muishover" id="comment<?php echo $i; ?>"> <?php echo $row['Opmerking']; ?> </td>
    <td class="muishover" id="Gereedschap<?php echo $i; ?>"> <?php echo $row['Type']; ?> </td>

    <td><a href="?edit=<?php echo $row['Product_ID']; ?>" onclick="return confirm('sure to edit !'); "> edit</a></td>
    <td><a href="?del=<?php echo $row['Product_ID']; ?>" onClick="return confirm('Confirm Delete!')"> Delete</a></td>
    </tr>
<?php
}
?>


</table>
</form>
</div>
</body>
