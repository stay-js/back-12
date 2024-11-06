FROM php:8.3.8-cli-alpine3.20

WORKDIR /app

COPY fogyasztas.php fogyasztas.php
COPY fuggvenyek.php fuggvenyek.php

ENTRYPOINT [ "php", "fogyasztas.php" ]
