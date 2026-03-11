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
    $sqls[] = "INSERT INTO ".$dbConfig['DB_PREFIX']."settings (`key` , `value` )
               VALUES ('googleMapKey', ''),
                      ('googleMapEnabled', '0'),
                      ('googleMapZoom', '3'),
                      ('remoteRssParsingEnabled', '1'),
                      ('companyInfoEnabled', '0'),
                      ('sitesSortyBy', 'creationDate'),
                      ('numberOfItemsForRssParsing', '5'),
                      ('numberOfCharactersForRssParsing', '150'),
                      ('numberOfCharactersForItemDescription', '200')";
                                                                           
    $sqls[] = "ALTER TABLE ".$dbConfig['DB_PREFIX']."sites
                      ADD `address` varchar(255) default NULL,
                      ADD `zipCode` varchar(255) default NULL,
                      ADD `city` varchar(255) default NULL,
                      ADD `country` varchar(255) default NULL,
                      ADD `phoneNumber` varchar(255) default NULL,
                      ADD `faxNumber` varchar(255) default NULL";
        
    foreach($sqls as $sql)
    {        
        $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
        
        if(!$res)
        {
            echo ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false));
            exit; 
        }
    }
    
    echo 'Updated successfully';
}
else
{

?>

<html>
<head>
</head>
<body>
<form action="" method="post">
<input type="submit" name="update" value="Update Now!" onclick="return confirm('Are you sure want to update to v1.0.5?')">
</form>

</body>
</html>

<?php
}
?>