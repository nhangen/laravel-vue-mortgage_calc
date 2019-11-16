## About This Project

This is a simple mortgage calculator build using Laravel, Vue.js, Axios, and other related libraries. Form input is validated via HTML5 elements, then processed on the front end via Vue.js templates. Successful submissions are stored in a MySQL database and a success/failure code is appended to the form to confirm submission status. 

Data stored includes loan principal, loan apr, loan term, monthly payment, user ip address, session id, and uuid (composed of a timestamp).

## Requirements

This package must be installed on either a Laravel Homestead/Valet enabled webserver, or a LAMP/LEMP instance that meets Laravel's minimum requirements.

Installation requires Composer and NPM. 

## To install

- Clone repository into webserver/application directory.
- Run composer install from application directory.
- Run npm install from application directory
- Duplicate .env.example and rename copy to .env. Update configuration values as required.
- Generate app key by running php artisan key:generate from application directory.
- Install database tables by running php artisan migrate from application directory.