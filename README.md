First run the 
composer install

In your terminal, install the ‘simple-peer’ and ‘pusher-js’ by running the following command:

npm install simple-peer --save-dev
npm install pusher-js --save-dev

Then, let’s add PHP library to interact with Pusher as a requirement of our project using Composer.

composer require pusher/pusher-php-server

copy .env.example to .env
then modify the databases

php artisan migrate 
php artisan key:generate

after doing above things

npm run dev

php artisan serve

after registration and login

http://127.0.0.1:8000/video_chat


.env file set  the below key for video call

PUSHER_APP_ID="1740681"
PUSHER_APP_KEY="5f5b37ece95df5c0aece"
PUSHER_APP_SECRET="6ec585840ac535293174"
PUSHER_APP_CLUSTER="ap3"