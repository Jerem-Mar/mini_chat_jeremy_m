
<?php 
    include 'include/lancement_session.php';

?>




<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"/>
    

    <title>Mini Chat!</title>
  </head>
  <body>

    <!-- NavBar qui reste fixe en haut -->
    <header>
        <nav class="navbar fixed-top navbar-light bg-dark">
             <a class="navbar-brand text-white mx-auto" href="#">👽 Bienvenue sur le chat de SIMPLON-ROANNE 👽</a>
        </nav>
    </header>


<section class="fond1">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <!-- Le jumbotron qui va englober toute la premiere partie -->
                <form method="post" action="minichat_post.php" onsubmit="storeMessage(event, this)">
                <div class="jumbotron text-center fond col-10 offset-1 ecriture">
                    <h1 class="display-4">On va s'éclater !</h1>
                    
                        <hr class="my-4">
                            <p><i>Fait les choses bien..<i></p>
                            <br />
                            <br />

                            <!-- Une belle DIV pour le pseudo -->
                            <p><strong>Ton petit nom</strong></p>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"></div>                                   
                                    <input required name="pseudo" type="text" class=" col-4 offset-4 form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" minlength="5" value="<?= $_COOKIE['pseudo'] ?? ' ' ?>">                                      
                            </div>
                                    <small id="emailHelp" class="form-text text-muted">Pas trop petit, 5 caractères minimum.</small>

                            <!-- Une belle DIV pour les messages -->
                            <p class="text-left"><strong>Ton message</strong></p>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"></div>                                   
                                    <input required name="message" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                                    <small id="emailHelp" class="form-text text-muted text-left">Défoule toi, mais pas trop.. On est pas sur Twitter ici, maximum 255 caractères.</small>
                            <br />

                            <!-- bouton d'envoie message et pseudo -->
                                <input id="btnEnvoyerChat" type="submit" class="btn btn-success btn-lg col-4 text-white" role="button" Envoyer /> 

                </div>
                </form>

            </div>
        </div> 
    </div>
</section>

<section class="codeTry">
<section class="codeTry2">
    <div class="container"> 
        <!-- Affichage des message ds le jumbotron -->
            <div id="message" class="Tchat"> 
                <div id="actu" class="row">
                <?php include 'affichage_donne.php' ?>

                </div>
            </div>  
    </div>
  
</section>
</section>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
   
    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="miniTchat.js"></script>
  </body>
</html>