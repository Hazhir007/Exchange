if [ "$1" = "seed" ]
 then
    php artisan migrate:fresh --seed
else
    php artisan migrate:fresh
fi

php artisan passport:client --personal

php artisan passport:client --password

