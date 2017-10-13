<?php
     define('_HOST_NAME','sql1.pcextreme.nl');
     define('_DATABASE_NAME','23540gm7products');
     define('_DATABASE_USER_NAME','23540gm7products');
     define('_DATABASE_PASSWORD','D1tiseenwachtwoord');

     $MySQLiconn = new MySQLi(_HOST_NAME,_DATABASE_USER_NAME,_DATABASE_PASSWORD,_DATABASE_NAME);

     if($MySQLiconn->connect_errno)
     {
       die("ERROR : -> ".$MySQLiconn->connect_error);
     }
?>
