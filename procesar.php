<?php 
require('connection.php');   //todo el string de conexion a mysql... me quedo con el handler $db
 
$sql = "SELECT * FROM tabla WHERE col1 = ".$_GET['id'];
$res = mysql_query($sql,$db);
while($row = mysql_fetch_assoc($res){ ?>
<option="<?=$row['col1']?>"><?=$row['col1']?></option>
  }
  ?>
