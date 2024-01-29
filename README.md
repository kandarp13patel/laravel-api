# Clone the Project

git clone https://github.com/kandarp13patel/laravel-api.git

Install the necessary packages using composer 

Create .env file and copy content from .env.example to .env file. and do database config changes. 

# install Composer
composer install

# Run the Migration.
php artisan migrate


# Run the Seeder.
php artisan db:seed

# Start development Server
php artisan serve

Start the development server on http://127.0.0.1:8000

# Set smtp setting in the .env file.