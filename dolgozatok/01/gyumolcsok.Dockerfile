FROM  php:8.3.8-cli-alpine3.20

WORKDIR /app

COPY adatok.php adatok.php
COPY gyumolcsok.php gyumolcsok.php

ENTRYPOINT ["php", "gyumolcsok.php" ]