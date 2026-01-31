FROM php:8.1-apache

# Install extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Set permissions for CodeIgniter cache/logs if needed (adjust as necessary)
RUN chown -R www-data:www-data /var/www/html
