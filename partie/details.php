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

?>

<pre>
    <?php print_r($details); echo  $details[0]["titre"] ?>
</pre>

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
<body>

<?php include_once "menu.php" ?>

<section class="container mt-3">

    <div class="d-flex justify-content-start">
        <div>
            <img src="<?=$details[0]["image"]?>" width="200px">
        </div>
        <div class="p-2 w-100">
            <h1>
                <?= $details[0]["titre"] ?>
            </h1>
            <p>
                <?= $details[0]["résumé"] ?>
            </p>
        </div>
    </div>

</section>



<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>