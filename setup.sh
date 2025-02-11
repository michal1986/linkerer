#!/bin/bash

# Create app directory
mkdir -p app

# Go into app directory
cd app

# Create new Symfony project
docker-compose run --rm php composer create-project symfony/skeleton .

# Install additional dependencies
docker-compose run --rm php composer require symfony/webapp-pack
docker-compose run --rm php composer require symfony/orm-pack
docker-compose run --rm php composer require symfony/maker-bundle --dev

# Set permissions
chmod -R 777 var/