#! /bin/bash

DOMAIN=$1

if [ "$DOMAIN" == "" ]; then
    $DOMAIN="localhost"
fi

mkdir -p ./docker/nginx/certs

echo """
==================================================
  Creating certificate for $DOMAIN
==================================================
"""
mkcert "game-api.$DOMAIN"


echo """
==================================================
  Moving $DOMAIN certificates to ./docker/nginx/certs
==================================================
"""

mv "./game-api.$DOMAIN.pem" "./docker/nginx/certs/api-ssl.crt"
mv "./game-api.$DOMAIN-key.pem" "./docker/nginx/certs/api-ssl.key"

echo """
==================================================
  Add the following to /etc/hosts file:

  127.0.0.1 $DOMAIN
==================================================
"""
