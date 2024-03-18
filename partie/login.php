<?php

//Déterminer si le formulaire à été soumis
// Utilisation d'une variable superglobale $_SERVEUR
// $_SERVEUR : tableau associatif contenant des informations sur la requete http

//echo "<pre>";
//var_dump($_SERVER);
//echo "</pre>";

/**
 * @var PDO $pdo
 */

require "../config/db_config.php";

$requete = $pdo->prepare("SELECT 'email_utilisateur' FROM utilisateur");

//3. Exécution de la requête
$requete->execute();

//4. Récupération des enregistrements
//1. enregistrement = 1 tableau associatif
$emails = $requete->fetchAll(PDO::FETCH_ASSOC);



$erreurs = [];
$pseudo = "";
$email = "";
$mdp = "";
$mdpVerif = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //le formulaire à été soumis !
    //Traiter les données du formulaire
    //Récupérer les valeur saisie par l'utilisateur
    // Superglobale $_POST : tableau associatif

    $pseudo = $_POST["pseudo"];
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];
    $mdpVerif = $_POST["mdpVerif"];

    //Validation des données
    if (empty($pseudo)) {
        $erreurs ["pseudo"] = "Le pseudo est obligatoire.";
    }
    if (empty($email)) {
        $erreurs ["email"] = "L'email est obligatoire.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs ["email"] = "L'email n'est pas valide.";
    }elseif () {
        $erreurs ["email"] = "L'email n'est pas valide.";
    }
    if (empty($mdp)) {
        $erreurs ["mdp"] = "Le mot de passe est obligatoire.";
    }
    if (empty($mdpVerif)) {
        $erreurs ["mdpVerif"] = "Le mot de passe doit être à nouveau saisie.";
    }elseif ($mdp!=$mdpVerif){
        $erreurs ["mdpVerif"] = "Le mot de passe saisie est différent, il doit être identique.";
    }

    //Traiter les données

    if (empty($erreurs)) {
        // Traitement des données (exemple insertion dans une base de données)
        //Redirigé l'utilisateur vers une autre page (la page d'accueil)

//2. Prépareration de la requête

        $mdpHacher=password_hash($mdp,PASSWORD_DEFAULT);

        $requete = $pdo->prepare("INSERT INTO utilisateur VALUES ($pseudo, $email, $mdpHacher)");

//3. Exécution de la requête
        $requete->execute();



        header("Location: ../index.php");
        exit();
    }

}


?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../assets/css/cyborg-bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body class="bg-light">
<!--Insertion d'un menu-->

<?php include_once 'menu.php' ?>

<div class="container">
    <h3 class="ms-5">Formulaire :</h3>

    <div class="w-75 mx-auto">
        <form action="" method="post" novalidate>

            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo* :</label>
                <input type="text"
                       class="form-control <?= (isset($erreurs["pseudo"])) ? "border border-2 border-danger" : "" ?>"
                       id="pseudo"
                       name="pseudo"
                       value="<?= $pseudo ?>"
                       placeholder="Saisissez votre pseudo">

                <?php if (isset($erreurs["pseudo"])) : ?>

                    <p class="form-text text-danger"> <?= $erreurs["pseudo"] ?></p>

                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email* :</label>
                <input type="text"
                       class="form-control <?= (isset($erreurs["email"])) ? "border border-2 border-danger" : "" ?>"
                       id="email"
                       name="email" value="<?= $email ?>" placeholder="Saisissez votre email"
                       aria-describedby="emailHelp">

                <?php if (isset($erreurs["email"])) : ?>

                    <p class="form-text text-danger"> <?= $erreurs["email"] ?></p>

                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="mdp" class="form-label">mot de passe* :</label>
                <input type="password"
                       class="form-control <?= (isset($erreurs["mdp"])) ? "border border-2 border-danger" : "" ?>"
                       id="mdp" name="mdp" placeholder="Saisissez votre mot de passe">

                <?php if (isset($erreurs["mdp"])) : ?>

                    <p class="form-text text-danger"> <?= $erreurs["mdp"] ?></p>

                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="mdpVerif" class="form-label"> confirmé votre mot de passe* :</label>
                <input type="password"
                       class="form-control <?= (isset($erreurs["mdpVerif"])) ? "border border-2 border-danger" : "" ?>"
                       id="mdpVerif" name="mdpVerif" placeholder="Saisissez à nouveau votre mot de passe">

                <?php if (isset($erreurs["mdpVerif"])) : ?>

                    <p class="form-text text-danger"> <?= $erreurs["mdpVerif"] ?></p>

                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Valider</button>
        </form>
    </div>
</div>

<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>