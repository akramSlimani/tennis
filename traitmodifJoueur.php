<?php
include 'connexion.php';
include 'fonctions.php';


if (isset($_GET['mode']) && $_GET['mode'] == 'supprimer') {
    if (isset($_GET['id'])) {
        supprimerJoueur($cnx, $_GET['id']);
    }
   // header("refresh:0 ");
    //header("Refresh:0;  url=joueur.php");

}

if (isset($_GET['mode']) && $_GET['mode'] == 'modifier' && isset($_POST['joueur_id'])) {
    $id = $_POST['joueur_id'];
    $nom = $_POST['joueur_nom'];
    $prenom = $_POST['joueur_prenom'];
    $age = $_POST['joueur_age'];
    $nationalite = $_POST['joueur_nationalite'];
    modifJoueur($cnx, $id, $nom, $prenom, $age, $nationalite);
    /*header('location : joueur.php');*/
}

if (isset($_GET['mode']) && $_GET['mode'] == 'ajouter' && isset($_POST['joueur_nom'])) {
    $nom = $_POST['joueur_nom'];
    $prenom = $_POST['joueur_prenom'];
    $age = $_POST['joueur_age'];
    $nationalite = $_POST['joueur_nationalite'];
    ajoutJoueur($cnx, $nom, $prenom, $age, $nationalite);
    /*header('location : joueur.php');*/
}
?>

    <!doctype html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Modification du joueur</title>
        <link rel="stylesheet" href="./../projet_php/CSS/style2.css">

    </head>
<body style="background:#C1CFC0">

    <header class="main-head">
        <nav>
            <h1 id="logo">Bienvenue au championnat du tennis 2021</h1>

            <ul>
                <li><a href="accu.php"> Accueil</a></li>
                <li><a href="joueur.php"> Joueurs</a></li>
                <li><a href="classement.php"> Classements</a></li>
            </ul>

        </nav>

    </header>




<?php


//  form Modif
if (isset($_GET['mode']) && $_GET['mode'] == 'modifier') {
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $requete = "SELECT * FROM P04_joueur WHERE joueur_id = '$id'";
    $ptrQuery = pg_query($cnx, $requete);
if ($ptrQuery) {
    $ligne = pg_fetch_assoc($ptrQuery);
    $nom = $ligne['joueur_nom'];
    $prenom = $ligne['joueur_prenom'];
    $age = $ligne['joueur_age'];
    $nationalite = $ligne['joueur_nationalite'];


    ?>
<section class="hero3">
    <h2 class="head1">  Modification du joueur : </h2>
    <br>
    <div style=" display: flex; flex-direction: column; align-items: center;">
<form method="post" action="traitmodifJoueur.php?mode=modifier">
    <table>
    <tr>
        <td><h1> <strong>Formulaire </strong></h1></td>
    </tr>
    <?php

    echo "	<input type='hidden' name='joueur_id' value=\"$id\"   >";
    echo "	<tr><td> Nom  * :</td></tr><tr><td><input type=text required='required' name='joueur_nom' value=\"$nom\"   ></td></tr>";
    echo "	<tr><td> Prénom * :</td></tr><tr><td><input type=text required='required' name='joueur_prenom'  value=\"$prenom\"  ></td></tr>";
    echo "	<tr><td> Age * :</td></tr><tr><td><input type=number required='required' name='joueur_age' min=2 max=100 value=\"$age\" ></td></tr>";
    echo "	<tr><td> Nationalité *:</td></tr><tr><td><input type=text  required='required' name='joueur_nationalite' value=\"$nationalite\" ></td></tr>";

    echo '</table>
<input type="submit" value="MODIFIER" name="MODIFIER">

</form>
</div>
</section>';

}
}

};


//  form ajout
if (isset($_GET['mode']) && $_GET['mode'] == 'ajouter') {
    ?>
    <section class="hero3">
        <h2 class="head1">  Ajout d'un joueur: </h2>
        <br>
    <div style=" display: flex; flex-direction: column; align-items: center;">
    <form method="post" action="traitmodifJoueur.php?mode=ajouter">

        <table>
            <tr>
                <td><H1> Formulaire</H1></td>
            </tr>
    <?php
    echo "	<tr><td> Nom  * :</td></tr><tr><td><input type=text required='required' name='joueur_nom'    ></td></tr>";
    echo "	<tr><td> Prénom * :</td></tr><tr><td><input type=text required='required' name='joueur_prenom'    ></td></tr>";
    echo "	<tr><td> Age * :</td></tr><tr><td><input type=number required='required' name='joueur_age' min=2 max=100  ></td></tr>";
    echo "	<tr><td> Nationalité *:</td></tr><tr><td><input type=text  required='required' name='joueur_nationalite'  ></td></tr>";

    echo '</table>

<input type="submit" value="AJOUTER" name="AJOUTER">

</form>
</div>
</section>';
}
?>