FROM php:8.3.8-cli-alpine3.20

WORKDIR /app

COPY f1.php f1.php
COPY adatok.php adatok.php

ENTRYPOINT [ "php", "f1.php" ]
