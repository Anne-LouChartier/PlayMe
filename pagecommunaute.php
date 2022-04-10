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
    <img src="Images/logoplayme.png" alt="logoPlayMe" id="logoPlayMe"> 
    <div>
    <a href="messagerie.php"><img src="Images/logoMessagerie2.png" alt="logoInbox" id="logoInbox"></a>
        <a href="pagepersonnel.php"><img src="Images/logoProfile2.png" alt="logoProfile" id="logoProfile"></a>
    </div>
        <!-- <div class="Liens-header">
                    <a class="acceuil" href="pageacceuil.php">Acceuil</a>
                    <a class="playlist" href="pageplaylist.php">Playlist / Bibliothèque</a>
                    <a class="messagerie" href="messagerie.php">Messagerie</a>
        </div> -->
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
</section>
    </div>
    <section id="fixe">
        <section id="gauche"></div>
            <div id="navgauche">
                <a href="pageacceuil.php"><p>ACCUEIL</p></a>
                <a href="pagecommunaute.php"><p>COMMUNAUTE</p></a>
                <a href="pageplaylist.php"><p>PLAYLISTES</p></a>
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

                <div class="suggestions1">
    <form method="post" class="add-commentaire">
        <textarea name="content" id="content" placeholder="Laissez votre commentaire ici"></textarea>
        <br><br>
        <input type="text" name="prenom" placeholder="Prénom">
        <input type="text" name="nom" placeholder="Nom">
        <br><br>
        <input type="submit" name="envoyer" value="Poster">
    </form>
    </div>
    <?php
                if($_POST) {
        $_POST['content'] = addslashes($_POST['content']);
        // J'envoie les informations dans la bdd 
        $pdo->exec("INSERT INTO commentaire (id_post, prenom, nom, content, heure_message) VALUES ('$_POST[id_post]','$_POST[prenom]', '$_POST[nom]', '$_POST[content]', NOW())");
    }

    $c = $pdo->query("SELECT * FROM commentaire WHERE id_post = '$_GET[id_post]'");
    $p = $pdo->query("SELECT * FROM post WHERE id_post = '$_GET[id_post]'");
    $photo = $p->fetch(PDO::FETCH_ASSOC);
    echo '<div class="zone-commentaire">';
        while ($commentaire = $c->fetch(PDO::FETCH_ASSOC)) {
                echo '<p>'. $commentaire['prenom'] . $commentaire['nom'] .' : ' . $commentaire['content'] . '</p>' ;
        }
    echo '</div>'
    ?>

                <div class="suggestions1"></div>    
                <form method="post" class="add-commentaire">
        <textarea name="content" id="content" placeholder="Laissez votre commentaire ici"></textarea>
        <br><br>
        <input type="text" name="prenom" placeholder="Prénom">
        <input type="text" name="nom" placeholder="Nom">
        <br><br>
        <input type="submit" name="envoyer" value="Poster">
    </form>

    <br><br>

                <div class="suggestions1"></div>
                <form method="post" class="add-commentaire">
        <textarea name="content" id="content" placeholder="Laissez votre commentaire ici"></textarea>
        <br><br>
        <input type="text" name="prenom" placeholder="Prénom">
        <input type="text" name="nom" placeholder="Nom">
        <br><br>
        <input type="submit" name="envoyer" value="Poster">
    </form>

    <br><br>

                <div class="suggestions1"></div>
                <form method="post" class="add-commentaire">
        <textarea name="content" id="content" placeholder="Laissez votre commentaire ici"></textarea>
        <br><br>
        <input type="text" name="prenom" placeholder="Prénom">
        <input type="text" name="nom" placeholder="Nom">
        <br><br>
        <input type="submit" name="envoyer" value="Poster">
    </form>
            </div>
            
    </section>
    <script src="pagecommunaute.js"></script>

</body>
</html>