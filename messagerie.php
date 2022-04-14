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

        <section id="droite2">
    <div id="overlay4" class="overlay4">
        <div id="popupmessage" class="popupmessage">
            <h2 class="titremess">Messagerie <span id="btnClosemess" class="btnClosemess">&times;</span></h2>
            <form method="post" id="messagerie">
                <div class="conversation">
                    <div class="question"><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam quisquam alias animi? Cupiditate temporibus reprehenderit facere tempora tempore harum, odit quasi? Molestias excepturi saepe, quidem aperiam quas in maxime quo! </p></div>
                    <br><br>
                    <div class="reponse"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, dicta!</p></div>
                    <br><br>
                    <div class="question"><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam quisquam alias animi? Cupiditate temporibus reprehenderit facere tempora tempore harum, odit quasi? Molestias excepturi saepe, quidem aperiam quas in maxime quo! </p></div>
                    <br><br>
                    <div class="reponse"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, dicta!</p></div>
                    </div>

                    <form method="post">
        <textarea name="message" id="content" placeholder="Ecrivez votre message ici"></textarea>
                <br><br>
                <input type="submit" id="envoyermsg" name="envoyermsg" value="Envoyer">
            </form>
            <div class="chat-messages"></div>
        </div>

        <?php
    if(isset($_POST['envoyermsg'])) {
            $mess = $pdo->query("SELECT * FROM messages");
            $message = $mess->fetch(PDO::FETCH_ASSOC);
            $id_envoyeur = $_SESSION['membres']['id_abonne'];
			$_SESSION['membres']['message'] = $message['texte'];
                if(!empty($_POST['message'])) {
                        $pdo->exec("INSERT INTO messages (id_envoyeur, id_receveur, texte) VALUES ($id_envoyeur, '24', '$_POST[message]')");                
                }
        } ?>

        </div>
    </div>
</form>
                            <h2 class="disc"> DISCUSSIONS </h2>
                        <div id="discussions">
                        <div class="disc1"><input id="btnLola" type="submit" value="LOLA"> 
                            <p class="histodis"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam quisquam alias animi? Cupiditate temporibus reprehenderit facere tempora tempore harum, odit quasi? Molestias excepturi saepe, quidem aperiam quas in maxime quo!</p>
                        </div>
                        <div class="disc1"><input type="submit" value="FLORIAN">  
                            <p class="histodis"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, doloremque.</p>
                        </div>
                        <div class="disc1"><input type="submit" value="ANNE-LOU"> 
                            <p class="histodis"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus deleniti cum vitae dignissimos vel sapiente enim molestiae hic?</p>
                        </div>
                        <div class="disc1"><input type="submit" value="CAMILLE">  
                            <p class="histodis"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et corrupti perspiciatis corporis similique molestiae.</p>
                        </div>
                        <div class="disc1"><input type="submit" value="SIMON">  
                        <p class="histodis"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam quisquam alias animi? Cupiditate temporibus reprehenderit facere tempora tempore harum, odit quasi? Molestias excepturi saepe, quidem aperiam quas in maxime quo!</p>
                        </div>
                        <div class="disc1"><input type="submit" value="OUSSMANE">  
                            <p class="histodis"> Lorem, ipsum dolor sit amet consectetur adipisicing.</p>
                        </div>
    </div>
            </section>
</section>

<script src="messagerie.js"></script>

</body>
</html>