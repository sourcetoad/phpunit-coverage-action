FROM php:8.0-cli

COPY coverage.php /coverage.php

ENTRYPOINT ["php", "/coverage.php"]
