FROM php:8.3.8-cli-alpine3.20

WORKDIR /app

COPY fokvalto.php fokvalto.php
COPY fuggvenyek.php fuggvenyek.php

ENTRYPOINT [ "php", "fokvalto.php" ]
