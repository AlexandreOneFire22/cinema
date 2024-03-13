<?php
// Récupère le paramètre d'URL "prenom"
// Tester la présence du paramètre

$id = null;

if(isset($_GET["id"])) {
    $id = $_GET["id"];

// Récupérer la liste des étudiants dans la table etudiant

//1. connexion à la base de données db_intro
    /**
     * @var PDO $pdo
     */

    require "../config/db_config.php";

//2. Prépareration de la requête

    $requete = $pdo->prepare("SELECT * FROM film WHERE id = $id");

//3. Exécution de la requête
    $requete->execute();

//4. Récupération des enregistrements
//1. enregistrement = 1 tableau associatif
    $details = $requete->fetchAll(PDO::FETCH_ASSOC);
}

$temps=$details[0]["durée"];

$minute=$temps%60;
$heure=($temps-$minute)/60;

$temps="$heure H $minute"


?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="../assets/css/cyborg-bootstrap.min.css" rel="stylesheet">
  <title>détails</title>
</head>
<body class="text-blanc">

<?php include_once "menu.php" ?>

<section class="container mt-3">

    <div class="d-flex justify-content-start bg-light">
        <div>
            <img src="<?=$details[0]["image"]?>" width="300px" class="m-3">
        </div>
        <div class="d-flex flex-column mb-3" style="height: 450px;">

            <div> <h1 class="m-3"><?= $details[0]["titre"] ?></h1></div>

            <div class="text-center m-3"> <?= $details[0]["résumé"] ?></div>

            <div class="mt-auto p-2">
                <div class="d-flex justify-content-evenly">

                    <div>durée : <?= $temps ?></div>
                    <div> pays : <?= $details[0]["pays"] ?></div>
                    <div> date de sortie : <?= $details[0]["date_sortie"] ?></div>

                </div>
            </div>
        </div>
    </div>

</section>



<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>