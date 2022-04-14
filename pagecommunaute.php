<?php 
include('init.php');
?>

<?php 
session_start();

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
        <form method="get">
        <div class="rubriques">
            <input id="recherchemult" type="text" name="recherche" placeholder="Rechercher" autocomplete="off">
            <input id="searchbutton" type="submit" name="donneerecherche" value="Rechercher">
        </div>
        </form>
</header>

        <div id="overlay3">
<section class="afficher_utilisateur">
</section>
    </div>
    <section id="fixe">
        <section id="gauche"></div>
            <div id="navgauche">
                <a href="pageacceuil.php"><p>ACCUEIL</p></a>
                <a href="pagecommunaute.php"><p>COMMUNAUTE</p></a>
                <a href="pageplaylist.php"><p>PLAYLISTES</p></a>

            <div id="currentmusic">
                <img src="Images/img1.jpg" alt="currentmusicimg">
                <div id="currentmusicbarre">
                    <img src="Images/boutonPrevious2.png" alt="logoprevious" class="previousnext">
                    <img src="Images/boutonPlay2.png" alt="logoplay" id="logoplay">
                    <img src="Images/boutonNext2.png" alt="logonext" class="previousnext">
                </div>
    </div>
            </div>

        </section>

        <section id="droite">
           
            <div id="posts">
                <div class="posts">
                    <img src="Images/4.png" width="120px" height="120px" alt="cover5">
                    <div class="rubriquepublication">
                    <p class="titrepublication"></p>
                    <p class="contenupublication">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae nostrum dolores, veniam dolorum harum corporis vero illum voluptatibus consequuntur! Esse officiis eos velit expedita, atque eligendi eum laboriosam quam minima.</p>
                    <p class="datepublication">Date de publication : </p>
                    </div>
                </div>
                <div class="suggestions1">
    <form method="post" class="add-commentaire">
        <textarea type="text" name="content" id="content" placeholder="Laissez votre commentaire ici"></textarea>
        <?php echo $_POST['content'];  ?>
        <input type="submit" name="envoyer" value="Poster">
    </form>
    <?php
    if(isset($_POST['envoyer'])) {
            $com = $pdo->query("SELECT * FROM commentaire");
            $commentaire = $com->fetch(PDO::FETCH_ASSOC);
            $id_envoyeur = $_SESSION['membres']['id_abonne'];
			$_SESSION['membres']['commentaire'] = $commentaires['content'];
                if(!empty($_POST['content'])) {
                        $pdo->exec("INSERT INTO commentaire (id_envoyeur, content) VALUES ($id_envoyeur, '$_POST[content]')");
                }
        } ?>
    </div>

                <div class="posts">
                <img src="Images/3.png" width="120px" height="120px" alt="cover5">
                <div class="rubriquepublication">
                    <p class="titrepublication"></p>
                    <p class="contenupublication">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae nostrum dolores, veniam dolorum harum corporis vero illum voluptatibus consequuntur! Esse officiis eos velit expedita, atque eligendi eum laboriosam quam minima.</p>
                    <p class="datepublication">Date de publication : </p>
                </div>
                </div>
                <div class="suggestions1">
    <form method="post" class="add-commentaire">
    <textarea type="text" name="content1" id="content" placeholder="Laissez votre commentaire ici"></textarea>
        <?php echo $_POST['content1'];  ?>                            
        <input type="submit" name="envoyer1" value="Poster">
    </form>
    <?php
    if(isset($_POST['envoyer1'])) {
            $com1 = $pdo->query("SELECT * FROM commentaire");
            $commentaire1 = $com1->fetch(PDO::FETCH_ASSOC);
            $id_envoyeur1 = $_SESSION['membres']['id_abonne'];
			$_SESSION['membres']['content1'] = $commentaires['content'];
                if(!empty($_POST['content1'])) {
                        $pdo->exec("INSERT INTO commentaire (id_envoyeur, content) VALUES ($id_envoyeur, '$_POST[content1]')");
                }
        } ?>
    </div>

                <div class="posts">
                <img src="Images/2.png" width="120px" height="120px" alt="cover5">
                    <div class="rubriquepublication">
                    <p class="titrepublication"></p>
                    <p class="contenupublication">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae nostrum dolores, veniam dolorum harum corporis vero illum voluptatibus consequuntur! Esse officiis eos velit expedita, atque eligendi eum laboriosam quam minima.</p>
                    <p class="datepublication">Date de publication : </p>
    </div>
                </div>
                <div class="suggestions1">    
                <form method="post" class="add-commentaire">
                <textarea name="content2" type="text" id="content" placeholder="Laissez votre commentaire ici"></textarea>
        <?php echo $_POST['content2'];  ?>                            
        <input type="submit" name="envoyer2" value="Poster">
    </form>
    <?php
    if(isset($_POST['envoyer2'])) {
            $com2 = $pdo->query("SELECT * FROM commentaire");
            $commentaire2 = $com2->fetch(PDO::FETCH_ASSOC);
            $id_envoyeur = $_SESSION['membres']['id_abonne'];
			$_SESSION['membres']['content2'] = $commentaires['content'];
                if(!empty($_POST['content2'])) {
                        $pdo->exec("INSERT INTO commentaire (id_envoyeur, content) VALUES ($id_envoyeur, '$_POST[content2]')");                
                }
        } ?>

    </div>
                <div class="posts">
                <img src="Images/1.png" width="120px" height="120px" alt="cover5">
                <div class="rubriquepublication">
                    <p class="titrepublication"></p>
                    <p class="contenupublication">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae nostrum dolores, veniam dolorum harum corporis vero illum voluptatibus consequuntur! Esse officiis eos velit expedita, atque eligendi eum laboriosam quam minima.</p>
                    <p class="datepublication">Date de publication : </p>
    </div>
                </div>
                <div class="suggestions1">
                <form method="post" class="add-commentaire">
        <textarea name="content3" id="content" placeholder="Laissez votre commentaire ici"></textarea>
        <br><br>
        <?php echo $_POST['content3'];  ?>                            
        <input type="submit" name="envoyer3" value="Poster">
    </form>
    <?php
    if(isset($_POST['envoyer3'])) {
            $com3 = $pdo->query("SELECT * FROM commentaire");
            $commentaire3 = $com3->fetch(PDO::FETCH_ASSOC);
            $id_envoyeur = $_SESSION['membres']['id_abonne'];
			$_SESSION['membres']['content3'] = $commentaires['content'];
                if(!empty($_POST['commentaire'])) {
                        $pdo->exec("INSERT INTO commentaire (id_envoyeur, content) VALUES ($id_envoyeur, '$_POST[commentaire]')");                
                }
        } ?>
    </div>
            </div>
            
    </section>
    <script src="pagecommunaute.js"></script>

</body>
</html>