<?php

include_once 'db.php';

/* code for data insert */
if(isset($_POST['save']))
{

     $Serienummer = $MySQLiconn->real_escape_string($_POST['Serienummer']);
     $Product = $MySQLiconn->real_escape_string($_POST['Product']);
     $Productiedatum = $MySQLiconn->real_escape_string($_POST['Productiedatum']);
     $Opmerking = $MySQLiconn->real_escape_string($_POST['Opmerking']);

  $SQL = $MySQLiconn->query("INSERT INTO Producten(Serienummer, Product, Productiedatum, Opmerking) VALUES('$Serienummer','$Product', '$Productiedatum', '$Opmerking')");

  if(!$SQL)
  {
   echo $MySQLiconn->error;
  }
}
/* code for data insert */


/* code for data delete */
if(isset($_GET['del']))
{
 $SQL = $MySQLiconn->query("DELETE FROM Producten WHERE Serienummer=".$_GET['del']);
 header("Location: index.php");
}
/* code for data delete */



/* code for data update */
if(isset($_GET['edit']))
{
 $SQL = $MySQLiconn->query("SELECT * FROM Product WHERE Serienummer=".$_GET['edit']);
 $getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
 $SQL = $MySQLiconn->query("UPDATE Product SET Product='".$_POST['Product']."', Productiedatum='".$_POST['Productiedatum']."' WHERE Serienummer=".$_GET['Serienummer']);
 header("Location: index.php");
}
/* code for data update */

?>
