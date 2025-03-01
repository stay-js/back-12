FROM php:8.3.8-cli-alpine3.20

WORKDIR /app

COPY vegyes.php vegyes.php

ENTRYPOINT [ "php", "vegyes.php" ]
