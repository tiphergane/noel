<!DOCTYPE html>
<?php require 'header.php'; ?>

<div id="description">
<p>Bonjour et bienvenue dans le Centre de commande du Père Noel</p>
<p>Ici les petits enfants qui ont été sage seront récompensés</p>
<br />
</div>
<p>
<div id="tableau">
                <h1> Liste de Noel de la Kitten Familly </h1>
                <?php require "cnx.php";
                 // on se connecte à MySQL
                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // on crée la requête SQL
                $sql = "SELECT * FROM wishes";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<TABLE><tr><th>Nom</th><th>Quoi</th><th>Lien</th><th>OK</th></tr>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["NOM"]. "</td><td>" . $row["CADEAU"]. "</td><td> " . $row["AMAZON"]. "</td><td>". $row["PRIS"]."</td></tr>";
                    }
                    echo "</TABLE><br />";
                } else {
                    echo "0 results<br />";
                }
                // on ferme la connexion à mysql
                mysqli_close($conn);?>
</div>
</p>
<br />
<?php require 'footer.php'; ?>
