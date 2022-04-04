<?php 
include('init.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Communauté</title>
    <link rel="stylesheet" href="stylecommunaute.css">
</head>
<body>
    <header>
    <img src="logoplayme.png" alt="logoPlayMe" id="logoPlayMe"> 
    <div>
        <img src="Images/logoMessagerie2.png" alt="logoInbox" id="logoInbox">
        <img src="Images/logoProfile2.png" alt="logoProfile" id="logoProfile">
    </div>
        <div class="Liens-header">
                    <a class="acceuil" href="pageacceuil.php">Acceuil</a>
                    <a class="playlist" href="pageplaylist.php">Playlist / Bibliothèque</a>
                    <a class="messagerie" href="messagerie.php">Messagerie</a>
        </div>
        <form method="get">
        <div class="rubriques">
            <input id="recherchemult" type="text" name="recherche" placeholder="Rechercher" autocomplete="off">
            <input id="searchbutton" type="submit" name="donneerecherche" value="Rechercher">
        </div>
        </form>
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
                    <a href="kanyewest.php"><div id="affichage_artiste"><p><?= $artister['nom']; ?></p></div></a>
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
        </section>
        
        <section id="droite">
           
            <div id="discover">

                <img src="Images/boutonPrevious2.png" alt="logoprevious" class="previousnext">
                <div>
                    <h2>TITRE</h2>
                    <h3>Artiste</h3>
                    <h4>Date</h4>
                    <h4>xxx écoutes</h4>
                </div>
                <img src="Images/boutonNext2.png" alt="logonext" class="previousnext">

            </div>


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
    <script src="pagecommunaute.js"></script>

</body>
</html>