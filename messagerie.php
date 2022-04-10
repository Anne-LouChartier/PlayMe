<?php 
include('init.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie</title>
    <link rel="stylesheet" href="stylepagemessagerie.css">
</head>

<body>
    <header>
        <div class="Liens-header">
            <a class="acceuil" href="pageacceuil.php">Retour Accueil</a>
            <a class="communaute" href="pagecommunaute.php">Communauté</a>
        </div>
    </header>

    <br><br>

    <form method="post" class="messagerie">
        <input type="text" name="prenom_receveur" placeholder="Prénom destinataire">
        <input type="text" name="nom_receveur" placeholder="Nom destinataire">
        <br><br>
        <textarea name="message" id="content" placeholder="Ecrivez votre message ici"></textarea>
        <br><br>
        <input type="text" name="prenom_envoyeur" placeholder="Prénom">
        <input type="text" name="nom_envoyeur" placeholder="Nom">
        <br><br>
        <input type="submit" name="envoyer" value="Envoyer">
    </form>

    <?php

    $m = $pdo->query("SELECT * FROM messages WHERE prenom_envoyeur = '$_POST[prenom_envoyeur]' AND WHERE nom_envoyeur = '$_POST[nom_envoyeur]'");

    if(isset($_POST)) {
        $message = $m->fetch(PDO::FETCH_ASSOC);
        $_POST['prenom_envoyeur'] = $message['prenom_envoyeur'];
        $_POST['nom_envoyeur'] = $message['nom_envoyeur'];
        $_POST['prenom_receveur'] = $message['prenom_receveur'];
        $_POST['nom_receveur'] = $message['nom_receveur'];
        $_POST['texte'] = $message['texte'];
        $_POST['date_envoie'] = $message['date_envoie'];
        $pdo -> exec("INSERT INTO messages (prenom_envoyeur, nom_envoyeur, prenom_receveur, nom_receveur, texte, date_envoie) VALUES ('$_POST[prenom_envoyeur]', '$_POST[nom_envoyeur]', md5('$_POST[prenom_receveur]'), '$_POST[nom_receveur]', '$_POST[texte]', '$_POST[date_envoie]')");
    }
    ?>
</body>
</html>