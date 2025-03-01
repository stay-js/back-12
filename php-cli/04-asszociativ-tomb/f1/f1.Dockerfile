FROM php:8.3.8-cli-alpine3.20

WORKDIR /app

COPY . .

ENTRYPOINT [ "php", "f1.php" ]
