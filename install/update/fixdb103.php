<?php

require_once("../../config/db.php"); 

if(!empty($_POST['update']))
{

    if(!($GLOBALS["___mysqli_ston"] = mysqli_connect($dbConfig['DB_HOST'], 
                      $dbConfig['DB_USER'], 
                      $dbConfig['DB_PASS'])))
                      {
                          die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false))); 
                      }
                  
    if(!((bool)mysqli_query($GLOBALS["___mysqli_ston"], "USE " . $dbConfig['DB_NAME'])))
    {
        die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false))); 
    }

    $sqls = array();
    
    $sqls[] = "DROP TABLE IF EXISTS `".$dbConfig['DB_PREFIX']."visits` ";
    
        $sqls[] = "CREATE TABLE IF NOT EXISTS `".$dbConfig['DB_PREFIX']."visits` (
  `ip` char(15) NOT NULL,
  `type` enum('ref','vis') NOT NULL,
  `id` int(11) default NULL,
  `ts` timestamp NOT NULL default CURRENT_TIMESTAMP,
  KEY `ts` (`ts`),
  KEY `ip` (`ip`,`id`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8";

   foreach($sqls as $sql)
   {
       mysqli_query($GLOBALS["___mysqli_ston"], $sql);
   }


}
else
{

?>

<html>
<head>
</head>
<body>
<form action="" method="post">
<input type="submit" name="update" value="Fix visits table!" onclick="return confirm('Are you sure want to fix visits table')">
</form>

</body>
</html>

<?php
}
?>