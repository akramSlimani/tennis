<?php
include 'connexion.php';
include 'fonctions.php';


if (isset($_GET['mode']) && $_GET['mode'] == 'supprimer') {
    if (isset($_GET['id'])) {
        supprimerClassement($cnx, $_GET['date'] , $_GET['id']);
    }
   // header("refresh:0 ");

}

if (isset($_GET['mode']) && $_GET['mode'] == 'modifier' && isset($_POST['class_date']) && isset($_POST['joueur_id'])) {
    $date = $_POST['class_date'];
    $points = $_POST['class_points'];
    $id= $_POST['joueur_id'];

    modifClassement($cnx, $date, $points, $id);
    /*header('location : joueur.php');*/
}

if (isset($_GET['mode']) && $_GET['mode'] == 'ajouter' &&  isset($_POST['joueur_id'])) {
    $date = $_POST['class_date'];
    $points = $_POST['class_points'];
    $id= $_POST['joueur_id'];
    ajoutClassement($cnx, $date, $points, $id);
    /*header('location : joueur.php');*/
}
?>

    <!doctype html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>modif classement</title>
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
    <section class="hero2">
        <div >
            <h3 class="head1"> Formulaire de modification du classement : </h3>
            <p>ce formulaire permet de modifier les classements .</p>

        </div>

    </section>

<?php


//  form Modif
if (isset($_GET['mode']) && $_GET['mode'] == 'modifier') {
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $date = $_GET['date'];
    $requete = "SELECT * FROM P04_classement WHERE joueur_id = '$id' AND class_date ='$date'";

    $ptrQuery = pg_query($cnx, $requete);
if ($ptrQuery) {
    $ligne = pg_fetch_assoc($ptrQuery);
    $points = $ligne['class_points'];

    ?>
<section class="hero3">
    <div style=" display: flex; flex-direction: column; align-items: center;">
<form method="post" action="traitmodifClassement.php?mode=modifier">
    <table>
    <tr>
        <td><H1> Formulaire </H1></td>
    </tr>
    <?php

    echo "	<input type='hidden' name='joueur_id' value=\"$id\"   >";
    echo "	<tr><td> Date yyyy-mm-dd * :</td></tr><tr><td><input type=text required='required' name='class_date' value=\"$date\"   ></td></tr>";
    echo "	<tr><td> Points * :</td></tr><tr><td><input type=number required='required' name='class_points'  value=\"$points\"  ></td></tr>";

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
    $id = $_GET['id'];
    ?>
    <section class="hero3">
        <div style=" display: flex; flex-direction: column; align-items: center;">
    <form method="post" action="traitmodifClassement.php?mode=ajouter">
        <table>
            <tr>
                <td><h1> Ajouter un classement </h1></td>
            </tr>
    <?php

    echo "	<input type='hidden' name='joueur_id' value=\"$id\"   >";
    echo "	<tr><td> Date yyyy-mm-dd* :</td></tr><tr><td><input type=text required='required' name='class_date'    ></td></tr>";
    echo "	<tr><td> Points * :</td></tr><tr><td><input type=number required='required' name='class_points'    ></td></tr>";

    echo '</table>
<input type="submit" value="AJOUTER" name="AJOUTER">

</form>
</div>
</section>';
}
?>