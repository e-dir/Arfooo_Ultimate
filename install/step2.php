<?php
/**
 * Arfooo
 * * @package    Arfooo
 * @copyright  Copyright (c) Arfooo Annuaire (fr) and Arfooo Directory (en)
 * by Guillaume Hocine (c) 2007 - 2010
 * http://www.arfooo.com/ (fr) and http://www.arfooo.net/ (en)
 * @author     Guillaume Hocine & Adrian Galewski
 * @license    http://creativecommons.org/licenses/by/2.0/fr/ Creative Commons
 */
session_start();
error_reporting(E_ALL);

// Initialisation des sessions si présentes en POST
if (isset($_POST['selectedLanguage'])) {
    $_SESSION['selectedLanguage'] = $_POST['selectedLanguage'];
}
if (isset($_POST['urlRewriting'])) {
    $_SESSION['urlRewriting'] = $_POST['urlRewriting'];
}

require_once('languages/' . $_SESSION['selectedLanguage'] . '.php'); 

/* collect configuration information to display */
$siteRootUrl = isset($_POST['siteRootUrl']) ? $_POST['siteRootUrl'] : '';
$_SESSION['siteRootUrl'] = $siteRootUrl;

clearstatcache(); 

// Détection de la version PHP
$phpVersion = phpversion();
$phpVersionCorrect = version_compare($phpVersion, "8.1", ">="); 

// Détection MySQL (on vérifie mysqli ou pdo_mysql qui sont les standards actuels)
$mysqlIndicator = extension_loaded('mysqli') || extension_loaded('pdo_mysql');

// Détection XML/DOM
$xmlIndicator = extension_loaded('dom') || extension_loaded('xml');

// Détection GD
$gdIndicator = extension_loaded('gd');

// Détection mod_rewrite (méthode alternative plus fiable que le parsing de phpinfo)
$modRewriteIndicator = false;
if (function_exists('apache_get_modules')) {
    $modRewriteIndicator = in_array('mod_rewrite', apache_get_modules());
} else {
    // Si on ne peut pas lister les modules, on tente de lire le fichier de test
    $phpinfoTestModRewrite = @fopen($siteRootUrl . 'install/info.html', 'r');
    if ($phpinfoTestModRewrite !== false) {
        $modRewriteIndicator = true;
        fclose($phpinfoTestModRewrite);
    }
}

// Permissions des répertoires
$cacheDirWritable = is_writable('../cache/');
$saveDirWritable = is_writable('../save/');             
$imagesCategoriesDirWritable = is_writable('../uploads/images_categories/');
$imagesThumbsDirWritable = is_writable('../uploads/images_thumbs/');
$configDirWritable = is_writable('../config/');
$compiledDirWritable = is_writable('../compiled/');  

function showYesNoSpan($param)
{
    global $language;
    
    if($param)
      return '<span class="text_green_bold">'.$language['Yes'].'</span>';
    else
      return '<span class="text_red_bold">'.$language['No'].'</span>'; 

}
?>


<?php
$chemin_includes_header = 'includes/';
include_once($chemin_includes_header.'header.php'); 
?>

<div class="title_h_4">
<?php echo $language['step2_welcome']?>
</div>

<?php echo $language['step2_desc1']?> 
<?php echo $language['step2_desc2']?> 
<a href="<?php echo $language['step2_url']?> " class="blue_orange" target="_blank"><?php echo $language['step2_desc3']?></a> 
<?php echo $language['step2_desc4']?> 
<?php echo $language['step2_desc5']?> 

<div class="title_h_3">
<?php echo $language['PHP, Libraries, Modules']?>
</div>
<div class="column_in_table2">
<table class="table3" cellspacing="1">
<col class="col1" /><col class="col2" />
<tbody>
<tr class="line1">
	<td><?php echo $language['PHP version']?>: </td>
	<td><span class="text_<?php echo  $phpVersionCorrect ? "green" : "red"?>_bold"><?php echo  $phpVersion ?></span></td>
</tr>
<tr class="line2">
	<td><?php echo $language['MySQL is Present']?>: </td>
	<td><?php echo showYesNoSpan($mysqlIndicator)?></td>
</tr>
<tr class="line1">
	<td><?php echo $language['XML is Present']?>: </td>
	<td><?php echo showYesNoSpan($xmlIndicator)?></td>
</tr>
<tr class="line2">
	<td><?php echo $language['GD is Present']?>: </td>
	<td><?php echo showYesNoSpan($gdIndicator)?></td>
</tr>
<tr class="line1">
	<td><?php echo $language['mod_rewrite is Present']?>: </td>
	<td><?php echo showYesNoSpan($modRewriteIndicator)?></td>
</tr>
</tbody>
</table>
</div>

<div class="title_h_3">
<?php echo $language['Permissions']?>
</div>

<div class="column_in_text">
<?php echo $language['step2_desc6']?> 
<?php echo $language['step2_desc7']?>
</div>

<div class="column_in_table2">
<table class="table3" cellspacing="1">
<col class="col1" /><col class="col2" />
<tbody>                                     
<tr class="line1">
	<td><?php echo $language['The cache/ directory is writable']?>: </td>
	<td><?php echo showYesNoSpan($cacheDirWritable)?></td>
</tr>
<tr class="line2">
	<td><?php echo $language['The save/ directory is writable']?>: </td>
	<td><?php echo showYesNoSpan($saveDirWritable)?></td>
</tr>
<tr class="line1">
	<td><?php echo $language['The uploads/images_categories/ directory is writable']?>: </td>
	<td><?php echo showYesNoSpan($imagesCategoriesDirWritable)?></td>
</tr>
<tr class="line2">
	<td><?php echo $language['The uploads/images_thumbs/ directory is writable']?>: </td>
	<td><?php echo showYesNoSpan($imagesThumbsDirWritable)?></td>
</tr>
<tr class="line1">
    <td><?php echo $language['The compiled/ directory is writable']?>: </td>
    <td><?php echo showYesNoSpan($compiledDirWritable)?></td>
</tr>
<tr class="line2">
	<td><?php echo $language['The config/db.php is writable']?>: </td>
	<td><?php echo showYesNoSpan($configDirWritable)?></td>
</tr>
</tbody>
</table>
</div>

<form action="step3.php" method="post">
<div class="column_in_button" align="center">
<input type="submit" class="button" value="<?php echo $language['Continue']?>" />
</div>
</form>

<?php
$chemin_includes_footer = 'includes/';
include_once($chemin_includes_footer.'footer.php'); 
?>