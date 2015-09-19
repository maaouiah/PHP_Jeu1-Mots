Projet Master 2 (PHP) : Jeu de mots
===================

###Jeu de mots en PHP

####Introduction

Après avoir vu les notions enseignées en cours de "PHP" et afin d’approfondir mes connaissances dans le domaine de programmation web, je suis amené à réaliser un jeu qui utilise les mots du français pour mettre à l’épreuve les connaissances du joueur.

####Jeu : 

Le jeu consiste à fournir au joueur 9 lettres tirées aléatoirement dont 6 consonnes et 3 voyelles. Le joueur doit fournir le maximum des mots avec ces lettres. Les mots doivent contenir au minimum 2 lettres et au maximum 9 lettres. Le jeu se termine dans 3 cas :
- Le joueur trouve 10 mots.
- Le joueur désire faire une nouvelle partie.
- Le temps de jeu est fini (180 secondes).
Le score du jeu se calcule en utilisant le barème des points du scrabble (par lettre)

####Problèmes rencontrés :

J’ai rencontré plusieurs problèmes lors de la réalisation. Le principal se situe au niveau de la connexion simultanée à deux bases de données. En effet, la version de php que j’ai utilisée ne me permettait pas de le faire.

La seconde difficulté que j’ai rencontrée se trouve au niveau du chronomètre. La conception d’un chronomètre qui décrémente visuellement n’est pas possible en php. Cette impossibilité est due au fait que php n’est pas un langage interprété. Toutefois, l’intégration du chronomètre dans un langage de programmation différent de php m’a aussi posé quelques problèmes. Effectivement, lorsqu’un utilisateur propose un mot, la page jeu.php est rechargée, annulant le décompte du compteur javascript. Il a donc fallu trouver une nouvelle solution pour ce problème.

####Solutions prises :
Après avoir consulté différents tutoriels en ligne pour résoudre le problème des connexions aux bases de données, j’ai choisi d’entrer les données permettant les connexions directement dans le code de la page jeu.php. Cette solution me permet de gérer la connexion successivement pour la base du lexique et pour celle des utilisateurs.
Les solutions que j’ai trouvées concernant le problème du chronomètre sont doubles. J’ai d’abord décidé de le réaliser en Javascript afin de permettre à l’utilisateur d’avoir un visuel du décompte et le problème de son intégration dans mon code php a pu se résoudre grâce à un input de type text caché dans le code de la page jeu.php. A chaque rechargement de page, le champ prend la valeur du chronomètre et permet de ce fait de restituer le décompte là où il s’était arrêté avant le rechargement.