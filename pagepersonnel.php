<?php 
// Afficher les différentes playlists des utilisateurs avec boutons pour ajouter la playlist à ses playlists ou la liker et les commenter 
// requête ajout like et post dans les tables concernées 
include('init.php');
?>

<?php 
session_start();
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
        <a href="messagerie.php"><img src="Images/logoMessagerie2.png" alt="logoInbox" id="logoInbox"></a>
        <a href="pagepersonnel.php"><img src="Images/logoProfile2.png" alt="logoProfile" id="logoProfile"></a>
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
        
        <section id="droite">
        <div id="publication"> 
            <form method="post">
                <input type="text" id="uname" name="publicationperso" required size="45"
                        placeholder="PARTAGER DU CONTENU..."
                        minlength="5" maxlength="300">
                <input type="submit" name="poster">
                </div>
            </form>
    </div>

           <?php 
            if(isset($_POST['poster'])) {
            $pub = $pdo->query("SELECT * FROM Post");
            $publication = $pub->fetch(PDO::FETCH_ASSOC);
            $id_envoyeur = $_SESSION['membres']['id_abonne'];
			$_SESSION['membres']['publication'] = $publication['texte'];
                if(!empty($_POST['publicationperso'])) {
                        $pdo->exec("INSERT INTO Post (id_abonne, texte) VALUES ($id_envoyeur, '$_POST[publicationperso]')");
                }
        } ?>

            <p class="titrepartie">POSTES</p>

            <div id="postes">

                <div class="post1">
                    <img src="Images/1.png" width="100px" height="100px" alt="Cover 1">
                    <div class="rubriquepubli">
                        <p>Daily Mix 1</p>
                    <?php print_r($_POST['publicationperso']);?>
                </div>
            </div>

                <div class="post1">
                <img src="Images/2.png" width="100px" height="100px" alt="Cover 1">
                    <div class="rubriquepubli">
                        <p>Daily Mix 2</p>
                    <?php print_r($_POST['publicationperso']);?>
                </div>
                </div>

                <div class="post1">
                <img src="Images/3.png" width="100px" height="100px" alt="Cover 1">
                    <div class="rubriquepubli">
                        <p>Daily Mix 3</p>
                    <?php print_r($_POST['publicationperso']);?>
                </div>
                </div>

                <div class="post1">
                <img src="Images/4.png" width="100px" height="100px" alt="Cover 1">
                    <div class="rubriquepubli">
                        <p>Daily Mix 4</p>
                    <?php print_r($_POST['publicationperso']);?>
                </div>
                </div>

                <div class="post1">                    
                    <img src="Images/1.png" width="100px" height="100px" alt="Cover 1">
                    <div class="rubriquepubli">
                        <p>Daily Mix 1</p>
                    <?php print_r($_POST['publicationperso']);?>
                </div>
                </div>

                <div class="post1">                    
                    <img src="Images/2.png" width="100px" height="100px" alt="Cover 1">
                    <div class="rubriquepubli">
                        <p>Daily Mix 5</p>
                    <?php print_r($_POST['publicationperso']);?>
                </div>
                </div>

                <div class="post1">
                <img src="Images/3.png" width="100px" height="100px" alt="Cover 1">
                    <div class="rubriquepubli">
                        <p>Daily Mix 6</p>
                    <?php print_r($_POST['publicationperso']);?>
                </div>
                </div>

                <div class="post1">
                    <img src="Images/1.png" width="100px" height="100px" alt="Cover 1">
                    <div class="rubriquepubli">
                        <p>Daily Mix 7</p>
                    <?php print_r($_POST['publicationperso']);?>
                </div>
            </div>

            <div class="post1">
                    <img src="Images/2.png" width="100px" height="100px" alt="Cover 1">
                    <div class="rubriquepubli">
                        <p>Daily Mix 8</p>
                    <?php print_r($_POST['publicationperso']);?>
                </div>
            </div>

            <div class="post1">
                    <img src="Images/3.png" width="100px" height="100px" alt="Cover 1">
                    <div class="rubriquepubli">
                        <p>Daily Mix 9</p>
                    <?php print_r($_POST['publicationperso']);?>
                </div>
            </div>

            <div class="post1">
                    <img src="Images/4.png" width="100px" height="100px" alt="Cover 1">
                    <div class="rubriquepubli">
                        <p>Daily Mix 10</p>
                    <?php print_r($_POST['publicationperso']);?>
                </div>
            </div>
            </div>

            <p class="titrepartie">BIBLIOTHÈQUE</p>

            <div id="bibli">
                <div class="bibli1">
                <img src="Images/4.png" width="100px" height="100px" alt="Cover 1">
                    <div class="rubriquepubli">
                        <p>House</p>
                    <?php print_r($_POST['publicationperso']);?>
                </div>
                </div>

                <div class="bibli1">
                <img src="Images/3.png" width="100px" height="100px" alt="Cover 1">
                    <div class="rubriquepubli">
                        <p>Rap US</p>
                    <?php print_r($_POST['publicationperso']);?>
                </div>
                </div>

                <div class="bibli1">
                <img src="Images/2.png" width="100px" height="100px" alt="Cover 1">
                    <div class="rubriquepubli">
                        <p>Rock</p>
                    <?php print_r($_POST['publicationperso']);?>
                </div>
                </div>

                <div class="bibli1">
                <img src="Images/1.png" width="100px" height="100px" alt="Cover 1">
                    <div class="rubriquepubli">
                        <p>Alternative</p>
                    <?php print_r($_POST['publicationperso']);?>
                </div>
                </div>

                <div class="bibli1">
                <img src="Images/4.png" width="100px" height="100px" alt="Cover 1">
                    <div class="rubriquepubli">
                        <p>Alternative</p>
                    <?php print_r($_POST['publicationperso']);?>
                </div>
                </div>

                <div class="bibli1">
                <img src="Images/3.png" width="100px" height="100px" alt="Cover 1">
                    <div class="rubriquepubli">
                        <p>Alternative</p>
                    <?php print_r($_POST['publicationperso']);?>
                </div>
                </div>

                <div class="bibli1">
                <img src="Images/2.png" width="100px" height="100px" alt="Cover 1">
                    <div class="rubriquepubli">
                        <p>Alternative</p>
                    <?php print_r($_POST['publicationperso']);?>
                </div>
                </div>

                <div class="bibli1">
                <img src="Images/1.png" width="100px" height="100px" alt="Cover 1">
                    <div class="rubriquepubli">
                        <p>Alternative</p>
                    <?php print_r($_POST['publicationperso']);?>
                </div>
                </div>

                <div class="bibli1">
                <img src="Images/4.png" width="100px" height="100px" alt="Cover 1">
                    <div class="rubriquepubli">
                        <p>Alternative</p>
                    <?php print_r($_POST['publicationperso']);?>
                </div>
                </div>

                <div class="bibli1">
                <img src="Images/3.png" width="100px" height="100px" alt="Cover 1">
                    <div class="rubriquepubli">
                        <p>Alternative</p>
                    <?php print_r($_POST['publicationperso']);?>
                </div>
                </div>

                <div class="bibli1">
                <img src="Images/2.png" width="100px" height="100px" alt="Cover 1">
                    <div class="rubriquepubli">
                        <p>Alternative</p>
                    <?php print_r($_POST['publicationperso']);?>
                </div>
                </div>

                <div class="bibli1">
                <img src="Images/1.png" width="100px" height="100px" alt="Cover 1">
                    <div class="rubriquepubli">
                        <p>Alternative</p>
                    <?php print_r($_POST['publicationperso']);?>
                </div>
                </div>

                <div class="bibli1">
                <img src="Images/4.png" width="100px" height="100px" alt="Cover 1">
                    <div class="rubriquepubli">
                        <p>Alternative</p>
                    <?php print_r($_POST['publicationperso']);?>
                </div>
                </div>

                <div class="bibli1">
                <img src="Images/3.png" width="100px" height="100px" alt="Cover 1">
                    <div class="rubriquepubli">
                        <p>Alternative</p>
                    <?php print_r($_POST['publicationperso']);?>
                </div>
                </div>
            </div>
            
    </section>
</body>
<script src="pagepersonnel.js"></script>

</html>