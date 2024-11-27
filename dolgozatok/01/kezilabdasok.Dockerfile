FROM  php:8.3.8-cli-alpine3.20

WORKDIR /app

COPY adatok.php adatok.php
COPY kezi.php kezi.php

ENTRYPOINT ["php", "kezi.php" ]