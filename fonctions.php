<?php


function ajoutJoueur($cnx,$nom,$prenom,$age,$nationalite){


    $sql1 = "INSERT INTO P04_joueur(joueur_nom , joueur_prenom, joueur_age,joueur_nationalite) VALUES('$nom','$prenom','$age','$nationalite')";
    $exec=pg_query($cnx,$sql1);
    header("Refresh:0;  url=joueur.php");
}

function modifJoueur($cnx, $idAModifier, $nom, $prenom, $age, $nationalite){
    $requete = "SELECT * FROM P04_joueur WHERE joueur_id = '$idAModifier'"; //select * ken bla where
    $result = pg_query($cnx, $requete);
    if($requete){
        $requeteModifiee = "UPDATE P04_joueur SET joueur_nom = '$nom', joueur_prenom = '$prenom', joueur_age = '$age', joueur_nationalite='$nationalite' WHERE joueur_id='$idAModifier'";
        $resultat = pg_query($cnx, $requeteModifiee);
        header("Refresh:0;  url=joueur.php");
    }else{
        echo"Requete impossible";

    }
}

function supprimerJoueur($cnx, $j_id){

    $sql="SELECT * FROM P04_joueur where joueur_id='$j_id' ";
    $result =pg_query($cnx,$sql);
    if(pg_num_rows($result)!=0){
        $sql1="DELETE FROM  P04_joueur WHERE joueur_id='$j_id'" ;
        $exec=pg_query($cnx,$sql1);
       header("Refresh:0;  url=joueur.php");

    }
    else{
        echo"SUPPRESSION IMPOSSIBLE  !!!";
    }
}


function ajoutClassement($cnx,$date,$points,$id){
    $sql1 = "INSERT INTO P04_classement(class_date , class_points, joueur_id) VALUES('$date','$points','$id')";
    $exec=pg_query($cnx,$sql1);
    header("Refresh:0;  url=classement.php");
}


/*Pour supprimer on a besoin de la date et l'id du joueur pour modifier les points (classement par point)*/
function modifClassement($cnx,$date, $pointsmodif , $id){
    $requete = "SELECT * FROM P04_classement WHERE class_date ='$date' AND  joueur_id = '$id'";
    $result = pg_query($cnx, $requete);
    if($requete){
        $requeteModifiee = "UPDATE P04_classement SET class_date = '$date',class_points = '$pointsmodif' WHERE joueur_id = '$id' AND class_date ='$date'";
        $resultat = pg_query($cnx, $requeteModifiee);

        header("Refresh:0;  url=classement.php");

    }else{
        echo"Requete impossible";

    }
}
/*Pour supprimer on a besoin de la date et l'id du joueur*/
function supprimerClassement($cnx, $date , $id){

    $sql="SELECT * FROM P04_classement WHERE class_date ='$date' AND  joueur_id = '$id'";
    $result =pg_query($cnx,$sql);
    if(pg_num_rows($result)!=0){
        $sql1="DELETE FROM  P04_classement WHERE class_date='$date' AND joueur_id = '$id'" ;
        $exec=pg_query($cnx,$sql1);
        header("Refresh:0;  url=classement.php");

    }
    else{
        echo "SUPPRESSION IMPOSSIBLE  !!!";
    }
}
