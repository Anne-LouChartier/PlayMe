<?php 
include('init.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlist</title>
    <link rel="stylesheet" href="stylepageplaylist.css">
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
</section>
    </div>
    <body>

    <body>
    <section id="fixe">
        <section id="gauche"></div>
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
        
        <section id="droite1">

            <div id="banniereartiste">
                <div id="pdpartiste"></div> 
                <h1> MES PLAYLISTS </h1>
            </div>

            <div class="musique">
                <img src="Images/boutonPlay2.png" alt="boutonplay">
                <div class="titreettags">
                    <h3>Daily Mix 1</h3>
                    <h4> Chill </h4>
                </div>
                <div class="minute">
                    03:42:27
                </div>
            </div>

            <div class="musique">
                <img src="Images/boutonPlay2.png" alt="boutonplay">
                <div class="titreettags">
                    <h3>Daily Mix 2</h3>
                    <h4> Rap US </h4>
                </div>
                <div class="minute">
                    03:02:08
                </div>
            </div>

            <div class="musique">
                <img src="Images/boutonPlay2.png" alt="boutonplay">
                <div class="titreettags">
                    <h3>Daily Mix 3</h3>
                    <h4> House / Funk </h4>
                </div>
                <div class="minute">
                07:09:12
                </div>
            </div>

            <div class="musique">
                <img src="Images/boutonPlay2.png" alt="boutonplay">
                <div class="titreettags">
                    <h3>Daily Mix 4</h3>
                    <h4>tags tags tags tags </h4>
                </div>
                <div class="minute">
                02:32:24
                </div>
            </div>
        </section>

        <section id="droite2">
            <div id="event">
                <h2> MES PLAYLISTS </h2>

                <div class="playlist1">
                    <figure>
                <figcaption>Daily Mix 1</figcaption>
                <audio
                    controls
                    src="Musiques/rap_eoz.mp4">
                    Your browser does not support the
                    <code>audio</code> element.
                </audio>
                </figure>
                </div>

                <div class="playlist1">
                <figure>
                <figcaption>Daily Mix 2</figcaption>
                <audio
                    controls
                    src="Musiques/rap_romain.mp4">
                    Your browser does not support the
                    <code>audio</code> element.
                </audio>
                </figure>
                </div>

                <div class="playlist1"> 
                <figure>
                <figcaption>Daily Mix 3</figcaption>
                <audio
                    controls
                    src="Musiques/rap_romain.mp4">
                    Your browser does not support the
                    <code>audio</code> element.
                </audio>
                </figure>

                </div>
                <div class="playlist1"> 
                <figure>
                <figcaption>Daily Mix 4</figcaption>
                <audio
                    controls
                    src="Musiques/rap_romain.mp4">
                    Your browser does not support the
                    <code>audio</code> element.
                </audio>
                </figure>
                </div>
            </div>

            <div id="publications">
                <h2> PUBLICATIONS </h2>
                <div class="publication1"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit dolorum quam excepturi eius, id doloribus soluta quo culpa voluptates. Recusandae ipsam non quam in blanditiis mollitia officiis ratione ut laboriosam.</div>
                <div class="publication1"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, sapiente! </div>
                <div class="publication1"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus fuga, rem sint omnis impedit harum distinctio quam laborum cumque saepe itaque voluptatibus minus minima iste ad, labore corrupti, facilis animi. </div>
                <div class="publication1"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus deserunt nostrum aperiam explicabo numquam commodi in soluta? Distinctio suscipit maxime, sed dolore laborum, quod mollitia, accusantium fugiat quaerat esse quas. </div>
                <div class="publication1"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore! </div>
                <div class="publication1"> Lorem ipsum dolor sit amet. </div>
                <div class="publication1"> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati culpa consectetur sed? Non voluptates deserunt quas nemo earum unde, exercitationem tenetur numquam adipisci, culpa, ut ea! Hic vel doloremque eius. </div>
            </div>
        </section>
            
    </section>

    
    <script src="js.js"></script>

</body>

</html>