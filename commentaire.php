<?php
include('init.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="mojo.css"> -->
    <title>MOJO</title>
</head>
<body>
    <?php
    //require 'init.php';

    if($_POST) {
        $_POST['content'] = addslashes($_POST['content']);
        // J'envoie les informations dans la bdd 
        $pdo->exec("INSERT INTO commentaire (id_post, prenom, nom, content, heure_message) VALUES ('$_POST[id_post]','$_POST[prenom]', '$_POST[nom]', '$_POST[content]', NOW())");
    }

    $c = $pdo->query("SELECT * FROM commentaire WHERE id_post = '$_GET[id_post]'");
    $p = $pdo->query("SELECT * FROM post WHERE id_post = '$_GET[id_post]'");
    $photo = $p->fetch(PDO::FETCH_ASSOC);
    ?>
    <h3 class='commentaire-page-title'>Commentaire</h3>
    <?php
    echo '<img src="' . 'upload/'.$photo['photo'] . '"' . 'alt="photo" class="img-commentaire">';
    echo '<div class="zone-commentaire">';
        while ($commentaire = $c->fetch(PDO::FETCH_ASSOC)) {
                echo '<p>'. $commentaire['prenom'] . $commentaire['nom'] .' : ' . $commentaire['content'] . '</p>' ;
        }
    echo '</div>'
    ?>
    <form method="post" class="add-commentaire">
        <textarea name="content" id="content" placeholder="Laissez votre commentaire ici"></textarea>
        <br><br>
        <input type="text" name="prenom" placeholder="Prénom">
        <input type="text" name="nom" placeholder="Nom">
        <br><br>
        <input type="submit" name="envoyer" value="Poster">
    </form>
    
    <a href="pageacceuil.php">Précédent</a>
</body>




   

