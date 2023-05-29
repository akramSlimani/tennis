<?php
include 'connexion.php';
include 'fonctions.php';
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Classements</title>
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
    <h2 > La liste des classements:</h2>
    <p >Pour ajouter un classement , appuyez sur <strong>ajouter</strong> puis effectuer l'ajout pour un joueur de votre choix.
        <a href='joueur.php'><strong>AJOUTER </strong></a></p>
    <p> Pour modifier ou supprimer, appuyez sur <strong>MODIFIER</strong> ou <strong>SUPPRIMER</strong> qui correspond au classement souhaité.</p>
    <form method="get" action="traitmodifClassement.php">

        <?php

        echo "<table><thead><tr>
            <th>Date </th>
            <th>Points</th>
            <th>ID joueur </th>
            <th>Supprimer</th>
            <th>Modifier</th>
            </tr></thead>";
        $requete = "SELECT * from P04_classement ORDER BY class_date DESC";
        $ptrQuery = pg_query($cnx, $requete);
        if ($ptrQuery) {
            while ($ligne = pg_fetch_assoc($ptrQuery)) {


                $intg = $ligne['class_date'];

                echo "<tbody><tr>
                    <td>" . $ligne['class_date'] . "</td>
                    <td>" . $ligne['class_points'] . "</td>
                    <td>" . $ligne['joueur_id'] . "</td>
                    <td> <a href='traitmodifClassement.php?mode=supprimer&date=" . $ligne['class_date'] . "&id=" . $ligne['joueur_id'] . "'> Supprimer</a> </td> 
                    <td> <a href='traitmodifClassement.php?mode=modifier&date=" . $ligne['class_date'] . "&id=" . $ligne['joueur_id'] . "'> Modifier</a> </td>
                    </tr></tbody> ";
            }


        }

        ?>
</form>
</div>
</section>
</body>
</html>