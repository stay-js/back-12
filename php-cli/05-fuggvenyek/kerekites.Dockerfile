FROM php:8.3.8-cli-alpine3.20

WORKDIR /app

COPY kerekites.php kerekites.php
COPY fuggvenyek.php fuggvenyek.php

ENTRYPOINT [ "php", "kerekites.php" ]
