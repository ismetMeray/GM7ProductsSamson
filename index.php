<<<<<<< HEAD
<?php
// Include config file
require_once 'config.php';

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username, password FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                            $_SESSION['username'] = $username;
                            header("location: view.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username:<sup>*</sup></label>
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password:<sup>*</sup></label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>
</body>
</html>
=======
<?php
include_once 'Crud.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="Style.css" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<head>
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
<script>
var selectRowData = function(clicked_id){
  var serial = "";
  var productName = "";
  var date = null;
  var comment = "";

    serial = document.getElementById('serial' + clicked_id).innerHTML;
    productName = document.getElementById('productName' + clicked_id).innerHTML;
    date = document.getElementById('date' + clicked_id).innerHTML;
    comment = document.getElementById('comment' + clicked_id).innerHTML;
    console.log(date);

    $("#serialField").val(serial);
    $("#productNameField").val(productName);
    $("#dateField").val(date);
    $("#commentField").val(comment);
};
</script>
</head>
<body>
<br/>
<div>
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
                        <div class="input-bx, right-inner-addon date datepicker">
                        <input id="serialField" type="text" name="Serienummer" class="form-control" value="">
                        </div>
                            <label class="labelCss" for="form_pass">Product</label>
                        <div class="input-bx, right-inner-addon date datepicker">
                            <input id="productNameField" name="form_pass"   type="text" class="form-control" required="" value=""/>
                        </div>
                            <label class="labelCss" for="form_pass">Productiedatum</label>
                                <div class='right-inner-addon date datepicker' data-date-format="dd-mm-yyyy">
        		                    <input id="dateField" name='name' value="<?php ?>" type="text" data-date-format="yyyy-mm-dd" style="text-align: center"/>
      			             </div>
                            <label class="labelCss" for="form_pass">Opmerking</label>
                        <div class="input-bx,right-inner-addon date datepicker">
                            <textarea id="commentField" name="form_pass" type="text" class="form-control" required="" value=""></textarea>
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
</div>
</body>
</html>
>>>>>>> parent of 1d5ee18... Change is view, crud working
