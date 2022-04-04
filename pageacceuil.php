<?php
include('init.php');
?>

<?php 
if ($_POST) {
    $erreur = '';
    if(strlen ($_POST['prenominscription'])< 3||strlen ($_POST['prenominscription']) > 20) {
        $erreur = '<p>Taille de prénom invalide</p>';
    }
    if (!preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['prenominscription'])) {
        $erreur .= '<p>Format de prénom invalide.</p>';
    }
        $r = $pdo -> query("SELECT * FROM abonnes WHERE email = '$_POST[emailinscription]'");
       if($r->rowCount() >= 1) {
           $erreur .= '<p>Email déjà utilisé.</p>';
       }
       foreach($_POST as $indice => $valeur) {
           $_POST[$indice] = addslashes($valeur);
       }
       $_POST['mdpinscription'] = password_hash($_POST['mdpinscription'], PASSWORD_DEFAULT);
       if (empty($erreur)) {
        $pdo -> exec("INSERT INTO abonnes (prenom, nom, mot_de_passe, email) VALUES ('$_POST[prenominscription]', '$_POST[nominscription]', '$_POST[mdpinscription]', '$_POST[emailinscription]')");
        $content .= '<p>Inscription validée !</p>';
        // echo "<script>window.alert('Bravo, inscription réalisée !! ','_self')</script>";           
       }
       $content .= $erreur;

       $q = $pdo->query("SELECT * FROM abonnes WHERE email = '$_POST[emailconnexion]'");

       if($r->rowCount() >= 1) {
           $membres = $r->fetch(PDO::FETCH_ASSOC);
           print_r($membre);
           if(password_verify($_POST['mdpconnexion'], $membres['mdpconnexion'])) {
               $content .= '<p>email + MDP : OK</p>';
               $_SESSION['abonnes']['emailconnexion'] = $membres['emailconnexion'];
               $_SESSION['abonnes']['mdpconnexion'] = $membres['mdpconnexion'];
               header('location:index.php');
           } else {
               $content .= '<p>Mot de passe incorrect.</p>';
           }
       } else {
        // echo "<script>window.alert('COMPTE INEXISTANT','_self')</script>";           
        $content .= '<p>Compte inexistant</p>';
       }   
} 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleAccueil.css">
    <title>Page d'Accueil</title>
</head>
<body>

<header>
    <img src="Images/logoplayme.png" alt="logoPlayMe" id="logoPlayMe"> 
    <div>
        <img src="Images/logoMessagerie2.png" alt="logoInbox" id="logoInbox">
        <img src="Images/logoProfile2.png" alt="logoProfile" id="logoProfile">
    </div>
    <div class="inscription_connexion">
            <input id="inscription" type="submit" value="S'inscrire">
            <input id="connexion" type="submit" value="Se connecter">
        </div>

        <form method="get">
        <div class="rubriques">
            <input id="recherchemult" type="search" name="recherche" placeholder="Rechercher" autocomplete="off">
            <input id="searchbutton" type="submit" name="donneerecherche" value="Rechercher">
        </div>
        </form>

        <div class="Liens-header">
            <a class="communaute" href="pagecommunaute.php">Communauté</a>
            <a class="playlist" href="pageplaylist.php">Playlist / Bibliothèque</a>
            <a class="messagerie" href="messagerie.php">Messagerie</a>
        </div>
</header>


        <form method="post">
    <div id="overlay" class="overlay">
        <div id="popupinscription" class="popupinscription">
            <h2>Inscription <span id="btnClose" class="btnClose">&times;</span></h2>
            <input name="prenominscription" type="text" placeholder="Votre Prénom">
            <input name="nominscription" type="text" placeholder="Votre Nom">
            <input name="emailinscription" type="email" placeholder="Votre e-mail">
            <input name="mdpinscription" type="password" placeholder="Votre mot de passe">
            <input type="submit" value="S'inscrire">
        </div>
    </div>
</form>

    <form method="post">
    <div id="overlay2" class="overlay2">
        <div id="popupconnexion" class="popupconnexion">
            <h2>Connexion <span id="btnClose2" class="btnClose2">&times;</span></h2>
            <input name="emailconnexion" type="email" placeholder="Votre e-mail">
            <input name="mdpconnexion" type="password" placeholder="Votre mot de passe">
            <input type="submit" value="Se connecter">
        </div>
    </div>
</form>

<div id="overlay3">
<section class="afficher_utilisateur">
    <?php 

        $allusers = $pdo->query("SELECT * FROM abonnes ORDER BY prenom DESC");
        $allmusics = $pdo->query("SELECT * FROM morceaux");
        $allartists = $pdo->query("SELECT * FROM artistes");


        if (isset($_GET['recherche'])) {
            $recherche = htmlspecialchars($_GET['recherche']);
            $allusers = $pdo->query("SELECT prenom, nom FROM abonnes WHERE prenom LIKE '%".$recherche."%'");
            $allmusics = $pdo->query("SELECT titre FROM morceaux WHERE titre LIKE '%".$recherche."%'");
            $allartists = $pdo->query("SELECT nom FROM artistes WHERE nom LIKE '%".$recherche."%'");
            if ($allusers->rowCount() > 0 XOR $allmusics->rowCount() > 0 XOR $allartists->rowCount() > 0) {
                while ($user = $allusers->fetch() XOR $titrer = $allmusics->fetch() XOR $artister = $allartists->fetch()) {
                    ?>
                    <div id="affichage_user"><p><?= $user['prenom'], $user['nom']; ?></p></div>
                    <div id="affichage_musique"><p><?= $titrer['titre']; ?></p></div>
                    <div id="affichage_artiste"><p><?= $artister['nom']; ?></p></div>
                    <?php
                }}        
        } elseif (empty($_POST['recherche'])) {
            ?>
            <p></p>
            <?php    
        } else {
        ?>
        <p>Aucun utilisateur, morceau ou artiste trouvé</p>
        <?php
        }
    ?>
</section>
    </div>
    <section id="fixe">
        <section id="gauche"></div>
            <div id="navgauche">
                <p>ACCUEIL</p>
                <p>COMMUNAUTE</p>
                <p>PLAYLISTES</p>
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
        
        <section id="droite">

            <p class="titrepartie">NOUVEAUTES</p>

            <div id="nouveautes">
                <div class="nouveautes1"></div>
                <div class="nouveautes1"></div>
                <div class="nouveautes1"></div>
                <div class="nouveautes1"></div>
            </div>

            <p class="titrepartie">SUGGESTIONS</p>

            <div id="suggestions">
                <div class="suggestions1"></div>
                <div class="suggestions1"></div>
                <div class="suggestions1"></div>
                <div class="suggestions1"></div>
            </div>
            
    </section>

        <script src="js.js"></script>
</body>
</html>

