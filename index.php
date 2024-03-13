<?php
// Récupérer la liste des étudiants dans la table etudiant

//1. connexion à la base de données db_intro
/**
 * @var PDO $pdo
 */

require "config/db_config.php";

//2. Prépareration de la requête

$requete = $pdo->prepare("SELECT * FROM film");

//3. Exécution de la requête
$requete->execute();

//4. Récupération des enregistrements
//1. enregistrement = 1 tableau associatif
$etudiants = $requete->fetchAll(PDO::FETCH_ASSOC);

$nb=0;
?>

<pre>
    <?php print_r($etudiants); echo  $etudiants[0]["image"] ?>
</pre>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="./assets/css/cyborg-bootstrap.min.css" rel="stylesheet">



    <title>cinéma</title>
</head>
<body>
    <?php include_once "partie/menu.php" ?>

    <section class="container container-fluid">


    <div class="row">

        <!-- nb = 0 -->

        <div class=" col-md-6 col-xl-3 ">
            <div class="card mb-3 p-0">
                <img src="<?= $etudiants[$nb]["image"] ?>" class="card-img-top p-0 p-2" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $etudiants[$nb]["titre"] ?></h5>
                    <p class="card-text text-truncate" style="max-width: 2000px;"> <?= $etudiants[$nb]["résumé"] ?></p>
                    <a href="partie/details.php?id=<?=$etudiants[$nb]["id"] ?>" class="btn btn-primary">Aller voir</a>
                </div>
            </div>
        </div>


        <?php $nb++;?>
        <!-- nb = 1 -->


        <div class=" col-md-6 col-xl-3 ">
            <div class="card mb-3 p-0">
                <img src="<?= $etudiants[$nb]["image"] ?>" class="card-img-top p-2" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $etudiants[$nb]["titre"] ?></h5>
                    <p class="card-text text-truncate" style="max-width: 2000px;"> <?= $etudiants[$nb]["résumé"] ?></p>
                    <a href="#" class="btn btn-primary">Aller voir</a>
                </div>
            </div>
        </div>


        <?php $nb++;?>
        <!-- nb = 2 -->

        <div class=" col-md-6 col-xl-3 ">
            <div class="card mb-3 p-0">
                <img src="<?= $etudiants[$nb]["image"] ?>" class="card-img-top p-0 p-2" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $etudiants[$nb]["titre"] ?></h5>
                    <p class="card-text text-truncate" style="max-width: 2000px;"> <?= $etudiants[$nb]["résumé"] ?></p>
                    <a href="#" class="btn btn-primary">Aller voir</a>
                </div>
            </div>
        </div>


        <?php $nb++;?>
        <!-- nb = 3 -->


        <div class=" col-md-6 col-xl-3 ">
            <div class="card mb-3 p-0">
                <img src="<?= $etudiants[$nb]["image"] ?>" class="card-img-top p-2" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $etudiants[$nb]["titre"] ?></h5>
                    <p class="card-text text-truncate" style="max-width: 2000px;"> <?= $etudiants[$nb]["résumé"] ?></p>
                    <a href="#" class="btn btn-primary">Aller voir</a>
                </div>
            </div>
        </div>



        <?php $nb++;?>
        <!-- nb = 4 -->



        <div class=" col-md-6 col-xl-3 ">
            <div class="card mb-3 p-0">
                <img src="<?= $etudiants[$nb]["image"] ?>" class="card-img-top p-0 p-2" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $etudiants[$nb]["titre"] ?></h5>
                    <p class="card-text text-truncate" style="max-width: 2000px;"> <?= $etudiants[$nb]["résumé"] ?></p>
                    <a href="#" class="btn btn-primary">Aller voir</a>
                </div>
            </div>
        </div>


        <?php $nb++;?>
        <!-- nb = 5 -->


        <div class=" col-md-6 col-xl-3 ">
            <div class="card mb-3 p-0">
                <img src="<?= $etudiants[$nb]["image"] ?>" class="card-img-top p-2" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $etudiants[$nb]["titre"] ?></h5>
                    <p class="card-text text-truncate" style="max-width: 2000px;"> <?= $etudiants[$nb]["résumé"] ?></p>
                    <a href="#" class="btn btn-primary">Aller voir</a>
                </div>
            </div>
        </div>


        <?php $nb++;?>
        <!-- nb = 6 -->

        <div class=" col-md-6 col-xl-3 ">
            <div class="card mb-3 p-0">
                <img src="<?= $etudiants[$nb]["image"] ?>" class="card-img-top p-0 p-2" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $etudiants[$nb]["titre"] ?></h5>
                    <p class="card-text text-truncate" style="max-width: 2000px;"> <?= $etudiants[$nb]["résumé"] ?></p>
                    <a href="#" class="btn btn-primary">Aller voir</a>
                </div>
            </div>
        </div>


        <?php $nb++;?>
        <!-- nb = 7 -->


        <div class=" col-md-6 col-xl-3 ">
            <div class="card mb-3 p-0">
                <img src="<?= $etudiants[$nb]["image"] ?>" class="card-img-top p-2" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $etudiants[$nb]["titre"] ?></h5>
                    <p class="card-text text-truncate" style="max-width: 2000px;"> <?= $etudiants[$nb]["résumé"] ?></p>
                    <a href="#" class="btn btn-primary">Aller voir</a>
                </div>
            </div>
        </div>


    </div>

    </section>


<script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>