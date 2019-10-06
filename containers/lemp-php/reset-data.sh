#!/bin/sh

/var/www/html/artisan migrate:fresh && /var/www/html/artisan db:seed
