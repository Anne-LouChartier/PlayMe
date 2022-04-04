<?php 
// Afficher les différentes playlists des utilisateurs avec boutons pour ajouter la playlist à ses playlists ou la liker et les commenter 
// requête ajout like et post dans les tables concernées 
include('init.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil personnel</title>
    <link rel="stylesheet" href="styleProfile.css">
</head>
<body>
<header>
<img src="Images/logoplayme.png" alt="logoPlayMe" id="logoPlayMe"> 
    <div>
        <img src="Images/logoMessagerie2.png" alt="logoInbox" id="logoInbox">
        <img src="Images/logoProfile2.png" alt="logoProfile" id="logoProfile">
    </div>
    <form method="get">
        <div class="rubriques">
            <input id="recherchemult" type="text" name="recherche" placeholder="Rechercher" autocomplete="off">
            <input id="searchbutton" type="submit" name="donneerecherche" value="Rechercher">
        </div>
        </form>

        <div class="Liens-header">
            <a class="acceuil" href="pageacceuil.php">Retour Accueil</a>
            <a class="communaute" href="pagecommunaute.php">Communauté</a>
            <a class="messagerie" href="messagerie.php">Messagerie</a>
        </div>
    
    </header>



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

            <form>
                <div>
                <input type="text" id="uname" name="name" required size="45"
                        placeholder="PARTAGER DU CONTENU..."
                        minlength="5" maxlength="300">
                <span class="poster"></span>
                </div>
                <div>
                <button>POSTER</button>
                </div>
            </form>


            <p class="titrepartie">POSTES</p>

            <div id="postes">
                <div class="post1"></div>
                <div class="post1"></div>
                <div class="post1"></div>
                <div class="post1"></div>
                <div class="post1"></div>
                <div class="post1"></div>
                <div class="post1"></div>
            </div>

            <p class="titrepartie">BIBLIOTHÈQUE</p>

            <div id="bibli">
                <div class="bibli1"></div>
                <div class="bibli1"></div>
                <div class="bibli1"></div>
                <div class="bibli1"></div>
                <div class="bibli1"></div>
                <div class="bibli1"></div>
                <div class="bibli1"></div>
                <div class="bibli1"></div>
                <div class="bibli1"></div>
                <div class="bibli1"></div>
                <div class="bibli1"></div>
                <div class="bibli1"></div>
                <div class="bibli1"></div>
                <div class="bibli1"></div>
            </div>
            
    </section>
</body>
<script src="pagepersonnel.js"></script>

</html>