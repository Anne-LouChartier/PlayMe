<?php 
include('init.php');
session_start();
?>

<?php
if($_POST) {
    if (isset($_POST['envoyer'])) {
        if(!empty($_POST['prenom_receveur']) AND !empty($_POST['nom_receveur']) AND !empty($_POST['message']))) {
            $prenomreceveur = htmlspecialchars($_POST['prenom_receveur']);
            $nomreceveur = htmlspecialchars($_POST['nom_receveur']);
            $message = htmlspecialchars($_POST['message']);
            $date = date('m-d-Y h:i:s a', time());

            $nvmessage = $pdo->prepare("INSERT INTO messages(prenom_receveur, nom_receveur, texte, date_envoie) VALUES (?, ?, ?, ?)");
            $nvmessage->execute(array($prenomreceveur, $nomreceveur, $message, $date));
        } else {
            echo "Veuillez compléter tous les champs";
        }
    }?>
}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie</title>
    <link rel="stylesheet" href="stylepagemessagerie.css">
</head>

    <header>
    <img src="Images/logoplayme.png" alt="logoPlayMe" id="logoPlayMe"> 
    <div>
        <a href="messagerie.php"><img src="Images/logoMessagerie2.png" alt="logoInbox" id="logoInbox"></a>
        <a href="pagepersonnel.php"><img src="Images/logoProfile2.png" alt="logoProfile" id="logoProfile"></a>
    </div>
        <form method="get">
        <div class="rubriques">
            <input id="recherchemult" type="search" name="recherche" placeholder="Rechercher" autocomplete="off">
            <input id="searchbutton" type="submit" name="donneerecherche" value="Rechercher">
        </div>
        </form>
    </header>

    <body>
    <section id="fixe">
        <section id="gauche">
            <div id="navgauche">
                <a href="pageacceuil.php"><p>ACCUEIL</p></a>
                <a href="pagecommunaute.php"><p>COMMUNAUTE</p></a>
                <a href="pageplaylist.php"><p>PLAYLISTES</p></a>
            </div>  
            
            <div id="currentmusic">
                <img src="Images/img1.jpg" alt="currentmusicimg">
                <div id="currentmusicbarre">
                    <img src="Images/boutonPrevious2.png" alt="logoprevious" class="previousnext">
                    <img src="Images/boutonPlay2.png" alt="logoplay" id="logoplay">
                    <img src="Images/boutonNext2.png" alt="logonext" class="previousnext">
                </div>
            </div>
        </section>

    <br><br>

            <section id="messageriegauche">
                <div id="messagerie">
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
        </div>
        </section>

        <section id="droite2">
                        <h2> DISCUSSIONS </h2>
                        <div class="disc1"> LOLA </div>
                        <div class="disc1"> FLORIAN </div>
                        <div class="disc1"> ANNE-LOU</div>
                        <div class="disc1"> CAMILLE </div>
                        <div class="disc1"> SIMON </div>
                        <div class="disc1"> OUSSMANE </div>
                        <div class="disc1"> LOIC </div>
                        <div class="disc1"> LOU </div>
                        <div class="disc1"> ETIENNE </div>
                        <div class="disc1"> TARIK </div>
                        <div class="disc1"> THOMAS </div>
            </section>
</section>
</body>
</html>