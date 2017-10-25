<?php

include_once 'db.php';

$Product_ID = $MySQLiconn->real_escape_string($_POST['Product_ID']);
$Serienummer = $MySQLiconn->real_escape_string($_POST['Serienummer']);
$ProductNaam = $MySQLiconn->real_escape_string($_POST['ProductNaam']);
$Productiedatum = $MySQLiconn->real_escape_string($_POST['Productiedatum']);
$Opmerking = $MySQLiconn->real_escape_string($_POST['Opmerking']);
$Type = $MySQLiconn->real_escape_string($_POST['Type']);


/* code for data insert */
if(isset($_POST['save']))
{



  $SQL = $MySQLiconn->query("INSERT INTO Producten(Serienummer, ProductNaam, Productiedatum, Opmerking, Type) VALUES('$Serienummer','$ProductNaam', '$Productiedatum', '$Opmerking', '$Type')");

  if(!$SQL)
  {
   echo $MySQLiconn->error;
  }
}
/* code for data insert */
/* receive data */
if(isset($_POST['receive']))
{
    $receive = $_POST['receive'];

    $result = $MySQLiconn->query("SELECT * FROM Producten");


    if ($result)
        echo "Book #" + $receive + " has been reserved.";
    else
        echo "An error message!";
}
/*code receive data*/



/* code for data delete */
if(isset($_GET['del']))
{
 $SQL = $MySQLiconn->query("DELETE FROM Producten WHERE Product_ID=".$_GET['del']);
 header("Location: index.php");
}
/* code for data delete */

/* code for data update */
if(isset($_GET['edit']))
{
 $SQL = $MySQLiconn->query("SELECT * FROM Producten WHERE Product_ID=".$_GET['edit']);
 $getROW = $SQL->fetch_array();
}


/* code for data update */

if(isset($_POST['update'])){

 $SQL = $MySQLiconn->query("UPDATE Producten set Serienummer = '".$_POST['Serienummer']."', ProductNaam = '".$_POST['ProductNaam']."', Productiedatum = '".$_POST['Productiedatum']."', Opmerking = '".$_POST['Opmerking']."', Type = '".$_POST['Type']."' WHERE Product_ID=".$_GET['edit']);
 header("Location: index.php");
}
/* code for data update */

?>
