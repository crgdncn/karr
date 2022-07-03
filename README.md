# setup

This app uses sqlite, run these commands

touch database/database.sqlite

touch database/test.sqlite

# Install packages

composer install

# migrations

php artisan migrate

php artisan db:seed --class=Data

# start web server

php artisan serve

# Create/Search Orders

From the homepage (http://localhost/)

Use the select boxes to add all values needed to create an order, then click "Create Order"

Use the select boxes to perform a filtered search, then click "List Orders"
