<?php
include_once 'Crud.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <form class="form-horizontal">
    <fieldset>

    <!-- Form Name -->

    <!-- Text input-->
    <div class="form-group">
    <label class="col-md-4 control-label" for="serialnumber">Serienummer</label>
    <div class="col-md-4">
    <input id="serialnumber" name="serialnumber" type="text" placeholder="Serienummer" class="form-control input-md" required="">

    </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
    <label class="col-md-4 control-label" for="productname">Product</label>
    <div class="col-md-4">
    <input id="productname" name="productname" type="text" placeholder="Product" class="form-control input-md" required="">

    </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
    <label class="col-md-4 control-label" for="productiondate">Productie datum</label>
    <div class="col-md-4">
    <input id="productiondate" name="productiondate" type="text" placeholder="placeholder" class="form-control input-md" required="">

    </div>
    </div>

    <!-- Textarea -->
    <div class="form-group">
    <label class="col-md-4 control-label" for="comments">Opmerkingen</label>
    <div class="col-md-4">
    <textarea class="form-control" id="comments" name="comments"></textarea>
    </div>
    </div>

    </fieldset>
    </form>
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
</td>
</tr>
</table>
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
    <td><?php echo $row['Productie datum']; ?></td>
    <td><?php echo $row['Opmerking']; ?></td>
    <td><a href="?edit=<?php echo $row['id']; ?>" onclick="return confirm('sure to edit !'); " >edit</a></td>
    <td><a href="?del=<?php echo $row['id']; ?>" onclick="return confirm('sure to delete !'); " >delete</a></td>
    </tr>
    <?php
}
?>
</table>
</div>
</center>
</body>
</html>
