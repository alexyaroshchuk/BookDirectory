Руководство по запуску:

1. docker-compose up -d

2. create .env

3. docker-compose exec app composer install

4. docker-compose exec app php artisan key:generate

5. docker-compose exec app php artisan config:cache

6. docker-compose exec app php artisan storage:link

7. docker-compose exec db bash

8. mysql -u root -p (your_mysql_root_password)

9. GRANT ALL ON laravel.* TO 'laraveluser'@'%' IDENTIFIED BY '1111';

10. FLUSH PRIVILEGES;

11. docker-compose exec app php artisan migrate --seed

12. npm run watch

13. L: admin@admin.com , P:admin

14. login (http://localhost/login)
