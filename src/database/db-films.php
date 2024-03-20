<?php

require_once "../../base.php";
require_once BASE_PROJET."/cinema/src/config/db_config.php";

// fonction permettant de récupérer tous les films

function getFilms():array
{
    $pdo = getConnexion();
    $requete = $pdo->query("SELECT * FROM film");
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}

function getDetails():array
{
    $pdo = getConnexion($id);
    $requete = $pdo->query("SELECT * FROM film WHERE id = $id");
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}