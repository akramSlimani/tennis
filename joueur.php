<?php
include 'connexion.php';
include 'fonctions.php';
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Joueurs</title>
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
<div>
    <h2 > La liste des joueurs:</h2>
    <p >Pour ajouter un joueur appuyez sur :
        <a href='traitmodifJoueur.php?mode=ajouter'><strong>AJOUTER </strong></a></p>
    <p> Pour modifier ou supprimer un joueur , appuyez sur <strong>MODIFIER</strong> ou <strong>SUPPRIMER</strong> .</p>
    <p> Pour ajouter un joueur aux classements , appuyez sur <strong>ajouter aux classements </strong> correspondant au joueur .</p>
    <p><strong>Attention :</strong> la suppression d'un joueur entraînera à supprimer ses classements .</p>
    <form method="get" action="traitmodifJoueur.php">


        <?php
        /*  echo "</table> <a href='traitmodifJoueur.php?mode=ajouter'  >AJOUTER </a>";*/


        echo "<table><thead><tr>
                <th>ID du joueur</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Age</th>
                <th>Nationalité</th>
                <th>Supprimer</th>
                <th>Modifier</th>
                <th>Classer</th>
                </tr></thead>";

        $requete = "SELECT * from P04_joueur ORDER BY joueur_id";
        $ptrQuery = pg_query($cnx, $requete);
        if ($ptrQuery) {
            while ($ligne = pg_fetch_assoc($ptrQuery)) {


                $intg = $ligne['joueur_id'];

                echo "<tbody><tr>
    <td>" . $ligne['joueur_id'] . "</td>
    <td>" . $ligne['joueur_nom'] . "</td>
    <td>" . $ligne['joueur_prenom'] . "</td>
    <td>" . $ligne['joueur_age'] . "</td>
    <td>" . $ligne['joueur_nationalite'] . "</td>
    <td> <a href='traitmodifJoueur.php?mode=supprimer&id=" . $ligne['joueur_id'] . "'> Supprimer</a> </td> 
    <td> <a href='traitmodifJoueur.php?mode=modifier&id=" . $ligne['joueur_id'] . "'> Modifier</a> </td>
    <td> <a href='traitmodifClassement.php?mode=ajouter&id=" . $ligne['joueur_id'] . "'> Ajouter aux classements</a> </td>
    </tr></tbody> ";
            }

        }

        ?>

</form>
</div>
</section>
</body>
</html>