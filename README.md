# INFO834-TP1

Pour ce TP, j'ai choisi de le déveloper en local, et d'utiliser les 3 technologies conseillées :

- MySQL : pour stocker les informations des utilisateurs
- Redis : pour gérer le cache de la session
- Python : pour récupérer les données de Redis

Tout d'abord, j'ai créé une table *utilisateur* dans MySQL, qui contient les champs nécessaires à la gestion des données des utilisateurs. Puis, une page login qui contient un formulaire de connexion envoyé en méthode post, pour vérifier dans la base MySQL si les identifiants rentrés sont correctes. Ensuite, si la connexion est un succès, un script Python est exécuté afin de gérer la session de l'utilisateur, qui est stocké dans Redis. L'utilisateur est renvoyé sur la page accueil où est affiché l'état de sa connexion.

## Fonctionnement du Script Python et de Redis

Pour gérer les sessions, j'ai choisi de créer deux entrées par utilisateur dans la base de données Redis : 

- email-count : une clé ayant pour valeur le nombre de connexion, initialisé à 1
- email-time : une clé qui expire au bout de 10 minutes lors de la première connexion

Lors de la première connexion, les deux clés sont générées. Puis à chaque nouvelle connexion, le script récupère les deux clés : si la clé time n'existe plus (*None*), alors les 10 minutes sont passées donc on regénère les deux clés. Sinon, on vérifie la clé count contenant le nombre de connexion ; s'il est inférieur à 10 alors on l'incrémente, sinon en renvoie le temps d'expiration de la clé time via la commande *ttl*. 

Le résultat est envoyé au script PHP via un print, enregistré dans la session, et affiché dans la page accueil.

## Problème rencontré

Le script Python fonctionne correctement, cependant j'ai testé de nombreuses manières d'utiliser shell_exec en PHP, mais je n'ai jamais réussi à le faire fonctionner. C'est aussi le cas d'autres de mes camarades sous Windows.