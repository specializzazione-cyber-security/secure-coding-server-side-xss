# Setup dell'ambiente di lavoro
1. ```composer install```
2. ```cp .env.example .env```
3. Imposta all'interno del .env i dati corretti per collegare il tuo database
4. esegui nel terminale: ```php Modules/database/user_seeder.php```
5. esegui nel terminale: ```php Modules/database/article_seeder.php```
6. ```cd public```
7. ```php -S localhost:8000``` per avviare il server locale