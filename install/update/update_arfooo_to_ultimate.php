<?php
/**
 * Arfooo - Custom Update
 * * @package    Arfooo
 * @copyright  Copyright (c) Arfooo Annuaire (fr) and Arfooo Directory (en)
 * by Guillaume Hocine (c) 2007 - 2010
 * http://www.arfooo.com/ (fr) and http://www.arfooo.net/ (en)
 * @author     Guillaume Hocine & Adrian Galewski
 * @license    http://creativecommons.org/licenses/by/2.0/fr/ Creative Commons
 */

require_once("../../config/db.php");

if(!empty($_POST['update']))
{
    // FIX PHP 8.1+ : Désactiver le crash par exception sur les erreurs SQL
    mysqli_report(MYSQLI_REPORT_OFF);

    // Connexion propre via MySQLi
    $link = @mysqli_connect($dbConfig['DB_HOST'], $dbConfig['DB_USER'], $dbConfig['DB_PASS']);

    if(!$link)
    {
        die("Erreur de connexion MySQL : " . mysqli_connect_error());
    }

    if(!@mysqli_select_db($link, $dbConfig['DB_NAME']))
    {
        die("Impossible de sélectionner la base de données : " . mysqli_error($link));
    }

    // Désactivation du mode strict au cas où
    mysqli_query($link, "SET SESSION sql_mode = ''");

    $prefix = $dbConfig['DB_PREFIX'];
    $sqls = array();

    // 1. Ajouter les colonnes dans la table sites
    $sqls[] = "ALTER TABLE `{$prefix}sites` 
               ADD `sitemeta` TEXT NOT NULL, 
               ADD `siteTitleseo` TEXT NOT NULL";

    // 2. Ajouter les nouvelles valeurs dans settings (IGNORE permet d'éviter une erreur si elles existent déjà)
    $sqls[] = "INSERT IGNORE INTO `{$prefix}settings` (`key`, `value`) VALUES 
               ('newsiteinhome', '1'),
               ('catinhome', '1'),
               ('aleainhome', '1'),
               ('commentinside', '1'),
               ('Rulesinsoum', 'A respecter'),
               ('selectionSitesnew', '4')";

    // 3. Modifier la valeur du template par arfooo_ultimate
    $sqls[] = "UPDATE `{$prefix}settings` 
               SET `value` = 'arfooo_ultimate_classic' 
               WHERE `key` = 'templateName'";

    $hasErrors = false;

    foreach($sqls as $sql)
    {
        $res = mysqli_query($link, $sql);

        if(!$res)
        {
            $errno = mysqli_errno($link);
            // On ignore l'erreur 1060 (Colonne déjà existante) pour pouvoir relancer le script sans bloquer
            if ($errno != 1060) {
                echo "<div style='color:red;'>Erreur sur la requête : <b>$sql</b><br>";
                echo "Message MySQL : " . mysqli_error($link) . "</div><br>";
                $hasErrors = true;
            }
        }
    }

    if (!$hasErrors) {
        echo '<div style="color:green; font-weight:bold;">Mise à jour effectuée avec succès ! (Updated successfully)</div>';
    } else {
        echo '<div style="color:orange; font-weight:bold;">Mise à jour terminée, mais certaines erreurs ont été ignorées (voir ci-dessus).</div>';
    }
}
else
{

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mise à jour de la base de données</title>
</head>
<body style="font-family: Arial, sans-serif; text-align: center; margin-top: 50px;">

    <h2>Mise à jour personnalisée de la base de données Arfooo</h2>
    <p>Cette action va ajouter les nouveaux champs SEO et mettre à jour les paramètres (Template, etc.).</p>

    <form action="" method="post">
        <input type="submit" name="update" value="Mettre à jour maintenant !" onclick="return confirm('Êtes-vous sûr de vouloir exécuter cette mise à jour ?')" style="padding: 10px 20px; font-size: 16px; cursor: pointer;">
    </form>

</body>
</html>

<?php
}
?>