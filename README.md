# La-Twittererie
Un **bot twitter** qui reprend le tweet iconique de **Jul** pour le dériver avec enormement de mots

![alt text](https://i.imgur.com/oJlqxpr.png)

## Installation
Ce qu'il faut pour faire fonctionner le bot :
- Un serveur PHP
- Une base de donnée MYSQL
- Un compte developpeur pour l'API Twitter

Personnellement, j'ai utilisé WAMP (comme le bot etait herbérgé localement) pour répondre à ces besoins .

**Comment l'installer?** :
- Rassembler les 3 fichiers ``tweet_julerie.php``, ``dbini.php``,``TwitterAPIExchange.php`` dans le même dossier (si vous n'y connaissez rien dans les chemin d'accès, sinon libre à vous de bidouiller)
- Créer un compte developpeur et etre approuvé ici https://developer.twitter.com/
- Créer une base de donnée ``lexique``avec les tables ``last_one`` et ``liste_mots`` et importer le fichier ``lexique.sql``
- Modifier le contenu du fichier ``dbini.php``avec les identifiants de votre BDD (déja rempli dans le fichier pour les configs par défaut)
ainsi que vos crédentials Twitter pour utiliser l'api dans les bon champs

> Au lancement du fichier "tweet_julerie.php" un tweet apparaitera sur le compte twitter du bot
Voilà :)

(Assets graphique de présentation : https://imgur.com/a/QhTiuKR)
