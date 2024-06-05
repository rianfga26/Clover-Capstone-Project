## ePosyandu Banjarsari
The Banjarsari village posyandu website provides health information including data on toddlers, pregnant women, the elderly and posbindu as well as activity documentation, activity schedules and other health articles.

## Setup & Intallation 

Tutorial setup ePosyandu Banjarsari 

Requirement environment : PHP => up to 8.0 version.


Install project in your folder
```bash
git clone https://github.com/rianfga26/Clover-Capstone-Project.git
```
Change directory
```bash
cd App/ePosyandu_Banjarsari
```
Install package in composer.json
```bash
composer install
```
Install vite and tailwind css
```bash
npm install
```

- copy .env.example and rename .env
- change configuration in env file for example: [DB_DATABASE=eposyandu]
- Don't forget to create new database `eposyandu` in phpMyAdmin

Run command for database table setup
```bash
php artisan migrate
```
Run command for application server
```bash
php artisan serve
```
Run command for build frontend in your new terminal
```bash
npm run dev
```

Thanks for your attention


