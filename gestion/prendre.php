<!doctype html>
<?php include '../header.php'; ?>

<div id="description">
<p>Ici vous choisissez le(s) cadeau(x) que vous voulez prendre en charge</p>
<p>Dans le tableau, insérez l'ID du cadeau que vous voulez prendre,<p>
<p>et entrez votre nom</p>
</div>

<div id="formget">
                <form method="POST" action="prendre.php">
                <table>
                <tr><td>NOM: </td><td> <input type="text" name="nom"></td></tr>
                <tr><td>ID: </td><td><input type="text" name="ID"></td></tr>
                </table>
                <input type="submit" name="bt" value="valider"><br>
                </form>
        </div>

<br />
<?php include("../cnx.php"); ?>

<?php

$conn = new mysqli($servername, $username, $password, $dbname);

if(!empty($_POST["nom"] && $_POST["ID"]))
{
$nd=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['nom']));
$puk=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['ID']));
$sql = "UPDATE wishes SET PRIS='$nd'WHERE ID='$puk'";
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

<div id="tabget">
<?php include("cnx.php");
                 // on se connecte à MySQL
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
// on crée la requête SQL
$sql = "SELECT * FROM wishes WHERE PRIS=''";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<TABLE><tr><th>ID</th><th>Qui</th><th>Quoi</th><th>OK</th></tr>";
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["ID"]. "</td><td>" . $row["NOM"]. "</td><td>" . $row["CADEAU"]. "</td><td> " . $row["PRIS"]."</td></tr>";
}
echo "</TABLE><br />";
} else {
echo "0 results<br />";
}
// on ferme la connexion à mysql
mysqli_close($conn);
?>
</div>
<?php include '../footer.php'; ?>


