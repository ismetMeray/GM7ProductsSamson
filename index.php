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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".input-bx").on('focus', 'input',function(){
        $('label[for='+$(this).attr('id')+']').addClass('input-bx-label');
        $(".input-bx input").addClass('input-bx-focus');
    });

    $(".input-bx input").on('blur',function(){
      if($(this).val()!="")
      {
        $(this)
          .addClass('input-bx-focus-out-true')
          .removeClass('input-bx-focus-out-false');
      }
      else
      {
        $(this)
          .addClass('input-bx-focus-out-false')
          .removeClass('input-bx-focus-out-true');
      }
    });
$('#login-modal').modal('show');
});
</script>

</head>

<body>
<br/>
<center>
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
if(isset($_GET['edit'])){
 ?>
 <button type="submit" name="update">update</button>
 <?php
}
 else{
 ?>
 <button type="submit" name="save">save</button>
 <?php
}
?>
</fieldset>
</form>
<center>
<br /><br />

<table width="100%" border="1" cellpadding="15" align="center">
  <script>
  var selectRowData = function(clicked_id){
    var serial = "";
    var productName = "";
    var date = "";
    var comment = "";

      serial = document.getElementById('serial' + clicked_id).innerHTML;
      productName = document.getElementById('productName' + clicked_id).innerHTML;
      date = document.getElementById('date' + clicked_id).innerHTML;
      comment = document.getElementById('comment' + clicked_id).innerHTML;
      console.log(productName);
  };
  </script>
<?php
$result = $MySQLiconn->query("SELECT * FROM Producten");
$i = 0;
while($row=$result->fetch_array())
{
    $i++;
 ?>
    <tr>
    <td id="serial<?php echo $i; ?>"> <?php echo $row['Serienummer']; ?></td>
    <td id="productName<?php echo $i; ?>"> <?php echo $row['Product']; ?></td>
    <td id="date<?php echo $i; ?>"> <?php echo $row['Productiedatum']; ?></td>
    <td id="comment<?php echo $i; ?>"> <?php echo $row['Opmerking']; ?></td>
    <td>
      <button id="<?php echo $i ?>" data-toggle="modal" data-target="#myModal" onClick="selectRowData('<?php echo $i ?>')" >Edit</button>

    </td>
    <td>
      <a href="?del=<?php echo $row['Serienummer']; ?>" onClick="return confirm('Confirm Delete!')"> Delete</a>
    </td>
    </tr>
<?php
}
?>
<div class="modal  fade" id="myModal"  >
<form id="loginform" class="form-horizontal" role="form" method="post">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header ">
            <h4 class="modal-title " id="myModalLabel"><span></span>Product Wijzigen</h4>
        </div>
        <div class="modal-body">
            <div id="login">
                <section class="Product-toevoegen" >
                            <label class="labelCss" for="form_user">Serienummer</label>
                        <div class="input-bx">
                        <input type="text" name="Serienummer" class="txtField" value="<?php echo $row['Serienummer']; ?>">
                        </div>
                            <label class="labelCss" for="form_pass">Product</label>
                        <div class="input-bx">
                            <input id="form_pass" name="form_pass"   type="text" class="form-control" required="" />
                        </div>
                            <label class="labelCss" for="form_pass">Productiedatum</label>
                                <div class='right-inner-addon date datepicker' data-date-format="dd-mm-yyy">
        		                    <input name='name' value="<?php ?>" type="date" class="form-control date-picker" data-date-format="dd-mm-yyy" style="text-align: center"/>
      			             </div>
                            <label class="labelCss" for="form_pass">Opmerking</label>
                        <div class="input-bx">
                            <textarea id="form_pass" name="form_pass" type="text" class="form-control" required=""></textarea>
                        </div>

                        <div class="modal-footer">
                         <!--<button type="button" id="register" class="btn btn-primary"><span class="glyphicon glyphicon-hand-right"></span> Product Toevoegen</button>-->
                            <a href="?edit=<?php echo $row['Serienummer']; ?>" class="btn btn-primary" onclick="return confirm('sure to update !'); " >Product Wijzigen</a>
                       </div><!-- /.modal-footer -->

                </section>
            </div>
        </div><!-- /.modal-body -->

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</form><!-- form -->
</div>

</table>
</div>
</body>
</html>
