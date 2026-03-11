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

    $tables = array("adcriterias" => array("name", "htmlContent"),
                    "categories" => array("name", "description"),
                    "comments" => array("pseudo", "text"),
                    "custommessages" => array("title", "description"),
                    "keywords" => array("keyword"),
                    "settings" => array("value"),
                    "sites" => array("siteTitle", "description", "proposalForKeywords", "proposalForCategory", "rssTitle"),
                    "users" => array("login"));
                    
    foreach($tables as $table => $fields)
    {
        $sql = "UPDATE ".$dbConfig['DB_PREFIX'].$table." SET ";
        
        $updateItems = array();
        
        foreach($fields as $field)
        {
            $updateItems[] = $field." = convert(BINARY convert(".$field." using latin1) using utf8)";
        }
        
        $sql .= implode(",\r\n", $updateItems);
        
        echo $sql."<br>"; 
        
        mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    }

    foreach(glob("../../cache/*") as $fileName)
    {
        if($fileName == ".htaccess")continue;
        unlink($fileName); 
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
<input type="submit" name="update" value="Convert db!" onclick="return confirm('Are you sure want to convert database?')">
</form>

</body>
</html>

<?php
}
?>