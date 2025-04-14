 <?php
    include("./config/config_bd.php");

    $message_operation = "";

    if (isset($_POST["s_inscrire"])) {

        // INSERTION DANS LA BASE
        //=====DECLARATION

        $pseudo_utilisateur             = $_POST["nom"];
        $email_utilisateur              = $_POST["email"];
        $genre_utilisateur              = $_POST["genre"];
        $date_utilisateur               = $_POST["date"];
        $mot_de_passe                   = $_POST["mot_de_passe"];


        //======VERIFICATION SI L"UTILISATEUR A ENTREE TOUTES LES INFORMATIONS
        if (
            !empty($pseudo_utilisateur) &&
            !empty($email_utilisateur)  &&
            !empty($genre_utilisateur)  &&
            !empty($date_utilisateur)   &&
            !empty($mot_de_passe)
        ) {

            //======VERIFICATION SI LE NOM D'UTILISATEUR EXISTE
            $sql_utlisateur_existe = 'SELECT pseudo_utilisateur FROM inscription
                                  WHERE pseudo_utilisateur = :pseudo_utilisateur';

            $requete_bd_table_connexion = $config->prepare($sql_utlisateur_existe);
            $requete_bd_table_connexion->execute(
                array(
                    ':pseudo_utilisateur' => $pseudo_utilisateur
                )
            );


            // COMPTE LE NOMBRE DE LIGNE SI CA N"EXISTE PAS ENVOIE 0
            $count_verif = $requete_bd_table_connexion->rowCount();
            // VERIFIER SI LE LOGIN EXISTE
            if ($count_verif <= 0) {

                //======REQUETES POUR CREATION DU COMPTE SI L"UTILISATEUR N'EXISTE
                $sql                            = "INSERT INTO inscription
                                                    (pseudo_utilisateur, email_utilisateur, genre_utilisateur, date_utilisateur, mot_de_passe) VALUES 
                                                    (:pseudo_utilisateur, :email_utilisateur, :genre_utilisateur, :date_utilisateur, :mot_de_passe) ";

                $requete                        = $config->prepare($sql);
                $requete->execute(
                    array(
                        ':pseudo_utilisateur'   => $pseudo_utilisateur,
                        ':email_utilisateur'    => $email_utilisateur,
                        ':genre_utilisateur'    => $genre_utilisateur,
                        ':date_utilisateur'     => $date_utilisateur,
                        ':mot_de_passe'         => password_hash($mot_de_passe, PASSWORD_DEFAULT)

                    )
                );
                $message_operation = "Votre compte a ete cree avec Success";
            }

            else{
                $message_operation = "Utilisateur existe deja";
            }



        } 
        else {
            $message_operation = "Veuillez remplir tous les champs";
        }
    }
    ?>

 <!DOCTYPE html>
 <html lang="fr">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>La minute</title>
     <link rel="stylesheet" href="./ergonomie/css/style.css">
     <link rel="stylesheet" href="./ergonomie/css/theme.css">
     <link href="https://api.fontshare.com/v2/css?f[]=satoshi@400,700,900&f[]=general-sans@500,600,700,1&f[]=cabinet-grotesk@500,800,900&f[]=switzer@500&display=swap" rel="stylesheet">
 </head>

 <body>
     <div class="index">
         <?php include("./composants/header.php") ?>
         <main>
             <form class="inscriptionContainer" action="" method="post">
                 <div class="inscription">
                     <h3>Inscription à la minute</h3>
                     <p>Crée un profil, suis d'autres comptes, crée tes propres vidéos et bien plus encore.</p>
                     <!-- EMPLACEMENT DU TOASTER -->
                     <span><?php echo $message_operation ?></span>
                     <div class="inputElement_inscrire">
                         <input type="text" name="nom" id="nom" placeholder="Nom d'utilisateur">
                         <input type="email" name="email" id="email" placeholder="Email">
                         <select name="genre" id="genre">
                             <option value="Masculin">Masculin</option>
                             <option value="Feminin">Feminin</option>
                             <option value="Autre">Autre</option>
                         </select>
                         <input type="date" name="date" id="date">
                         <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="Mot de passe">
                     </div>
                     <div class="btn_container_inscrire">
                         <button type="submit" name="s_inscrire">S'inscrire</button>
                     </div>
                     <div class="barre">
                         <span></span>
                         <p>Ou connectez-vous avec</p>
                         <span></span>
                     </div>
                     <div class="others">
                         <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48">
                                 <path fill="#ffc107" d="M43.611 20.083H42V20H24v8h11.303c-1.649 4.657-6.08 8-11.303 8c-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C12.955 4 4 12.955 4 24s8.955 20 20 20s20-8.955 20-20c0-1.341-.138-2.65-.389-3.917" />
                                 <path fill="#ff3d00" d="m6.306 14.691l6.571 4.819C14.655 15.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C16.318 4 9.656 8.337 6.306 14.691" />
                                 <path fill="#4caf50" d="M24 44c5.166 0 9.86-1.977 13.409-5.192l-6.19-5.238A11.9 11.9 0 0 1 24 36c-5.202 0-9.619-3.317-11.283-7.946l-6.522 5.025C9.505 39.556 16.227 44 24 44" />
                                 <path fill="#1976d2" d="M43.611 20.083H42V20H24v8h11.303a12.04 12.04 0 0 1-4.087 5.571l.003-.002l6.19 5.238C36.971 39.205 44 34 44 24c0-1.341-.138-2.65-.389-3.917" />
                             </svg></a>
                         <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                 <path fill="currentColor" d="M9.198 21.5h4v-8.01h3.604l.396-3.98h-4V7.5a1 1 0 0 1 1-1h3v-4h-3a5 5 0 0 0-5 5v2.01h-2l-.396 3.98h2.396z" />
                             </svg></a>
                     </div>
                     <a href="index.php" class="s_inscrire">Connectez-vous a votre compte</a>
                 </div>
             </form>
         </main>
         <?php include("./composants/footer.php") ?>
     </div>
     <script src="./ergonomie/js/script.js"></script>
 </body>

 </html>