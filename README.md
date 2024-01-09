
![Logo](https://i.ibb.co/TRsfBYj/expertease-ijo-p02.png)


# ExpertEase

Expertease is your go-to platform for freelance expertise. Whether you're a freelancer offering your skills or a client in search of top talent, Expertease connects you effortlessly. Find experts in a variety of fields, from web development and graphic design to content writing and more. Join our community and tap into a world of freelance excellence. Welcome to Expertease, where skills meet opportunity.


## Run Locally

Clone the project

```bash
  git clone https://github.com/thirtyfive-35/freelancer-website-yazilim-sinama.git
```

Go to the project directory

```bash
  cd freelancer-website-yazilim-sinama-main
```

Install dependencies

```bash
  composer install
  npm install
  npm run dev
```

Migrating tables

```bash
  cp .env.example .env
  php artisan key:generate
  php artisan migrate --seed
```

Start the server

```bash
  php artisan serve
```
dont forget to change database options in .env file

note:

php --version
PHP 8.3.1 (cli) (built: Dec 20 2023 14:06:10) (ZTS Visual C++ 2019 x64)
Copyright (c) The PHP Group
Zend Engine v4.3.1, Copyright (c) Zend Technologies




## thanks you @Oecophyllaa for the template 


