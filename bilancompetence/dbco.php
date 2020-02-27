<?php ini_set('display_errors', 'On');
error_reporting(-1);


$username="root";
$password="root";
$hostname="localhost";
$namebase="generateurCitation";

// on tente la connexion à la base de donnée
try {
  $bdd=new PDO('mysql:host=localhost;dbname=generateurCitation;charset=utf8', 'root', 'root');
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}

catch (PDOException $e) {
  // En cas d'erreur, on affiche un message et on arrête tout
  echo $sql ."<br>". $e->getMessage();
}

;


// On récupère tout le contenu de la table citation
$reponse=$bdd->query('SELECT * FROM citation ORDER BY RAND() LIMIT 1');

// On affiche chaque entrée une à une et colonne par colonne
while ($donnees=$reponse->fetch()) {
  ?><br><br><p><?php echo $donnees['citation'];
  ?><br><br><br><br><br>- <?php echo $donnees['acteur'];
  ?></p><?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
