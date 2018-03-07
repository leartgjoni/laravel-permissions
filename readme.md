# Laravel Project with role based permissions.

Roles have permissions on various routes. A user in a role has by default all permissions of his role, but they can be overwritten for that specific user.

# Here some examples:
![alt text](https://raw.githubusercontent.com/leartgjoni/laravel-permissions/master/demo/permissions.png)
![alt text](https://raw.githubusercontent.com/leartgjoni/laravel-permissions/master/demo/no_permissions.png)
![alt text](https://raw.githubusercontent.com/leartgjoni/laravel-permissions/master/demo/roles.png)
![alt text](https://raw.githubusercontent.com/leartgjoni/laravel-permissions/master/demo/users.png)

# How to run the app

1. composer install
2. create .env file
3. php artisan migrate
4. php artisan db:seed
5. log in with admin@admin.com/password
6. create roles and users
7. add your own routes following the naming format ("example.example")
8. Enjoy!

# Don't forget to star this repo ;)