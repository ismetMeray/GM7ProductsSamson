<?php

include_once 'db.php';

$Serienummer = $MySQLiconn->real_escape_string($_POST['Serienummer']);
$Product = $MySQLiconn->real_escape_string($_POST['Product']);
$Productiedatum = $MySQLiconn->real_escape_string($_POST['Productiedatum']);
$Opmerking = $MySQLiconn->real_escape_string($_POST['Opmerking']);

/* code for data insert */
if(isset($_POST['save']))
{



  $SQL = $MySQLiconn->query("INSERT INTO Producten(Serienummer, Product, Productiedatum, Opmerking) VALUES('$Serienummer','$Product', '$Productiedatum', '$Opmerking')");

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
 $SQL = $MySQLiconn->query("DELETE FROM Producten WHERE Serienummer=".$_GET['del']);
 header("Location: index.php");
}
/* code for data delete */



/* code for data update */

if(isset($_POST['update']))
{
 $SQL = $MySQLiconn->query("UPDATE Producten SET Serienummer = '$Serienummer', Product = '$Product', Productiedatum = '$Productiedatum', Opmerking = '$Opmerking' WHERE Serienummer = $Serienummer, Product = $Product, Productiedatum = $Productiedatum, Opmerking = $Opmerking");
 header("Location: index.php");
}
/* code for data update */

?>
