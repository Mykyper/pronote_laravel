# Utiliser l'image officielle de PHP
FROM php:8.0-fpm

# Installer les dépendances
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev libzip-dev libonig-dev libxml2-dev git unzip
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd pdo pdo_mysql

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier les fichiers du projet
COPY . .

# Installer les dépendances PHP avec Composer
RUN composer install --no-dev --optimize-autoloader

# Exposer le port 8080
EXPOSE 8080

# Démarrer le serveur PHP
CMD ["php-fpm"]
