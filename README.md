# sm-test

-- steps to setup --

1] composer install
2] copy .env.example to .env and set database connection
3] php artisan migrate //using command line
4] php artisan l5-swagger:generate  //using command line

Access URL like followed (depence you set path)
http://localhost/sm-test/public/api/documentation