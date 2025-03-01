FROM php:8.3.8-cli-alpine3.20

WORKDIR /app

COPY tanc.php tanc.php
COPY adatok.php adatok.php

ENTRYPOINT [ "php", "tanc.php" ]
