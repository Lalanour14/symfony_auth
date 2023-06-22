# Symfony Auth
Projet symfony avec de l'authentification

1. Cloner le projet
2. Lancer `composer install`
3. Créer une base de données et importer le database.sql dedans
4. Lancer le serveur avec `symfony server:start`


## Authentification étapes
Etapes qui sont à priori valable quelque soit le framework, dans le cas d'une connexion avec mot de passe et hashing

### Inscription
1. On vérifie si un user existe déjà en base de données avec le username/email/identifiant donné
2. Si non, on hash le mot de passe avec un algorithme, du sel et du poivre
3. On stock en base de données le user avec son identifiant et son mot de passe hashé et son sel

### Connexion
1. Le user envoie vers le backend son identifiant et son mot de passe en clair
2. On récupère le user correspondant à l'identifiant donné (s'il existe, sinon, erreur de connexion)
3. On prend le mot de passe et on récupère le sel dedans
4. On hash le mot de passe en clair envoyé au moment du login avec le sel et le poivre stockés
5. On compare les 2 hash pour voir s'ils correspondent
6. Si oui, connexion réussi, on crée une session utilisateur pour l'identifiant donné