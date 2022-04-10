<?php
include('init.php');
?>

<?php 
// PAGE ARTISTE INDIVIDUELLE
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artiste</title>
    <link rel="stylesheet" href="styleArtiste.css">
</head>

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
                    <a href="pagepersonnel.php"><div id="affichage_user"><p><?= $user['prenom'], $user['nom']; ?></p></div></a>
                    <a href="playlist.php"><div id="affichage_musique"><p><?= $titrer['titre']; ?></p></div>
                    <a href="artiste.php"><div id="affichage_artiste"><p><?= $artister['nom']; ?></p></div></a>
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
</header>

<body>
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
        
        <section id="droite1">

            <div id="banniereartiste">
                <div id="pdpartiste"></div> 
                <h1> NOM ARTISTE </h1>
            </div>

            <div class="musique">
                <img src="Images/boutonPlay2.png" alt="boutonplay">
                <div class="titreettags">
                    <h3>TITRE</h3>
                    <h4>tags tags tags tags </h4>
                </div>
                <div class="minute">
                    00:00
                </div>
            </div>

            <div class="musique">
                <img src="Images/boutonPlay2.png" alt="boutonplay">
                <div class="titreettags">
                    <h3>TITRE</h3>
                    <h4>tags tags tags tags </h4>
                </div>
                <div class="minute">
                    00:00
                </div>
            </div>

            <div class="musique">
                <img src="Images/boutonPlay2.png" alt="boutonplay">
                <div class="titreettags">
                    <h3>TITRE</h3>
                    <h4>tags tags tags tags </h4>
                </div>
                <div class="minute">
                    00:00
                </div>
            </div>

            <div class="musique">
                <img src="Images/boutonPlay2.png" alt="boutonplay">
                <div class="titreettags">
                    <h3>TITRE</h3>
                    <h4>tags tags tags tags </h4>
                </div>
                <div class="minute">
                    00:00
                </div>
            </div>
        </section>

        <section id="droite2">
            <div id="event">
                <h2> EVÈNEMENT </h2>
                <div class="event1"> CONCERT AVEC MICHOU</div>
                <div class="event1"> CONCERT AVEC MICHOU</div>
                <div class="event1"> CONCERT AVEC MICHOU</div>
                <div class="event1"> CONCERT AVEC MICHOU</div>
                <div class="event1"> CONCERT AVEC MICHOU</div>
                <div class="event1"> CONCERT AVEC MICHOU</div>
                <div class="event1"> CONCERT AVEC MICHOU</div>
                <div class="event1"> CONCERT AVEC MICHOU</div>
            </div>

            <div id="publications">
                <h2> PUBLICATIONS </h2>
                <div class="publication1"> Le prochain son va vous gifler comme Will Smith la miff </div>
                <div class="publication1"> Le prochain son va vous gifler comme Will Smith la miff </div>
                <div class="publication1"> Le prochain son va vous gifler comme Will Smith la miff </div>
                <div class="publication1"> Le prochain son va vous gifler comme Will Smith la miff </div>
                <div class="publication1"> Le prochain son va vous gifler comme Will Smith la miff </div>
                <div class="publication1"> Le prochain son va vous gifler comme Will Smith la miff </div>
                <div class="publication1"> Le prochain son va vous gifler comme Will Smith la miff </div>
                
            </div>


        </section>
            
    </section>
</body>


</html>