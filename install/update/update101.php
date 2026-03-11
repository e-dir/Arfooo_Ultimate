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

    $sql = "INSERT INTO ".$dbConfig['DB_PREFIX']."settings (`key` , `value` )
            VALUES ('automaticCommentValidation', '1')";
            
    mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	
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
<input type="submit" name="update" value="Update Now!" onclick="return confirm('Are you sure want to update to v1.0.1?')">
</form>

</body>
</html>

<?php
}
?>