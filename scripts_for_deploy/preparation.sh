#!/bin/bash
mkdir -p /usr/share/nginx/html/reading_output/
find /usr/share/nginx/html/reading_output/ -type f -exec chmod 664 {} \;
find /usr/share/nginx/html/reading_output/ -type d -exec chmod 774 {} \;
chown -R ec2-user:nginx /usr/share/nginx/html/reading_output/

chmod -R 775 /usr/share/nginx/html/reading_output/storage
chmod -R 775 /usr/share/nginx/html/reading_output/cache

# db migrate
cd /usr/share/nginx/html/reading_output/
php artisan migrate
composer install