<!DOCTYPE html>
<?php include '../header.php'; ?>

<div id="description">
	<p>Dans Amazon, merci de mettre le lien vers le descriptif de l'article. </p>
	<p>Si c'est sur Amazon, mettre https://www.amazon.fr/dp/XXXXXXXX ou XXXXXXX est la série après le /dp/</p>
	<p> /!\ TOUTES LES LIGNES DOIVENT ÊTRE REMPLIE /!\ </p>
</div>
<div id="formulaire">
                <form method="POST" action="ajout.php">
                <table>
                <tr><td>NOM: </td><td> <input type="text" name="nom"></td></tr>
                <tr><td>CADEAU: </td><td><input type="text" name="cadeau"></td></tr>
                <tr><td>AMAZON: </td><td><input type="text" name="amazon"></td></tr>
                </table>
                <input type="submit" name="bt" value="valider"><br>
                </form>
        </div>
        <?php include("../cnx.php");?>
        <?php

                $conn = new mysqli($servername, $username, $password, $dbname);

		                                if ($conn->connect_error) {
							                                die("Connection failed: " . $conn->connect_error);
											                                }

/* Si les champs ne sont pas vide, alors on se connecte à la BDD et on envoie les infos */
if(!empty($_POST["nom"] && $_POST["cadeau"] && $_POST["amazon"]))
{
$nom=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['nom']));
$cadeau=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['cadeau']));
$amazon=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['amazon']));
$sql = "INSERT INTO wishes (NOM,CADEAU,AMAZON) VALUES ('$nom','$cadeau','$amazon')";
if($conn->query($sql)===TRUE)
{
echo"<div id='resultat'>";
echo"<font face='Verdana' size='3' >L'élément a bien été inséré !</font>";
echo"</div>";
}
else    {
echo "<div id='resultat'>";
echo "<font face='Verdana' size='3' > Error: " .$sql. "<br />" . $conn->error;
}
}
mysqli_close($conn);
?>
<?php include '../footer.php'; ?>
