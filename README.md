<div align="center">

# Projet PHP - Gestion du championnat de tennis

</div>

Ce projet PHP vise à mettre en place un système de gestion du championnat de tennis. Il permet d'effectuer différentes opérations liées aux joueurs et aux classements, telles que l'ajout, la modification et la suppression des données.

## Contenu du projet
Le projet est composé des fichiers suivants :

## connexion.php :
Ce fichier établit la connexion à la base de données PostgreSQL en utilisant les paramètres de connexion tels que l'hôte, le nom de la base de données, le nom d'utilisateur et le mot de passe.

## joueur.php : 
Ce fichier contient la page principale de gestion des joueurs. Il affiche une liste des joueurs existants, permet l'ajout, la modification et la suppression des joueurs, ainsi que l'ajout d'un joueur aux classements.

## classement.php : 
Ce fichier représente la page de gestion des classements. Il affiche la liste des classements existants, offre la possibilité d'ajouter, de modifier et de supprimer des classements.

## traitmodifClassement.php : 
Ce fichier contient les scripts de traitement des opérations liées aux classements. Il gère les fonctionnalités de suppression, modification et ajout de classements dans la base de données.

## traitmodifJoueur.php :
Ce fichier contient les scripts de traitement des opérations liées aux joueurs. Il gère les fonctionnalités de suppression, modification et ajout de joueurs dans la base de données.

## fonctions.php :
 Ce fichier contient des fonctions utilitaires utilisées dans les scripts de traitement pour effectuer les opérations sur la base de données.

## Fonctionnalités du projet:

Le projet permet de réaliser les fonctionnalités suivantes :

Affichage de la liste des joueurs existants avec leurs informations (identifiant, nom, prénom, âge, nationalité).
Possibilité d'ajouter un nouveau joueur en remplissant un formulaire.
Possibilité de modifier les informations d'un joueur existant en accédant à un formulaire de modification spécifique.
Suppression d'un joueur de la base de données, entraînant également la suppression de ses classements associés.
Affichage de la liste des classements existants avec la date, les points et l'identifiant du joueur associé.
Possibilité d'ajouter un nouveau classement en remplissant un formulaire avec la date, les points et l'identifiant du joueur correspondant.
Possibilité de modifier un classement existant en accédant à un formulaire de modification spécifique.
Suppression d'un classement de la base de données.
Technologies utilisées
Le projet utilise les technologies suivantes :

`PHP` : Utilisé pour le développement du backend et l'interfaçage avec la base de données.
PostgreSQL : Système de gestion de base de données relationnelle utilisé pour stocker les données des joueurs et des classements.

`HTML` : Utilisé pour structurer les pages web et afficher les informations.

`CSS` : Utilisé pour la mise en forme et la présentation visuelle des pages web.

## Comment contribuer :
Si vous souhaitez contribuer à ce projet, vous pouvez cloner le dépôt GitHub et effectuer vos modifications. N'hésitez pas à proposer des améliorations, des corrections de bugs ou de nouvelles fonctionnalités en soumettant des pull requests.
