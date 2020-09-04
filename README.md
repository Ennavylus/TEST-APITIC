
## Installer le Projet


### - Pré-requis :
    - PHP > 7
    - Composer

### - Clonez ce depot

### - Deplacez-vous dans le dossier du projet.

### - Installez les dependances via la commande suivante:
 ```bash 
 composer install
 ```

### - Créez une copie de votre fichier .env
 ```bash 
cp .env.example .env
 ```
 
### - Générez votre clé d’encryption
 ```bash 
php artisan key:generate
 ```

### - Créez une base de données vide pour votre projet Laravel

### - Configurez votre fichier .env pour permettre une connexion à la base de donnée.
Dans le fichier .env, remplissez les options DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME et DB_PASSWORD pour qu'elles correspondent aux informations d'identification de la base de données que vous venez de créer. 

### - Ajoutez les tables et contenus de votre base de données avec les migrations ou en sql
 ```bash 
php artisan migrate:fresh --seed
 ```

### - Lancez ensuite le serveur 
 ```bash 
php artisan serve
 ```
