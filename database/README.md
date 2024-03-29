
![Logo](https://i.ibb.co/TRsfBYj/expertease-ijo-p02.png)


# ExpertEase

Expertease is your go-to platform for freelance expertise. Whether you're a freelancer offering your skills or a client in search of top talent, Expertease connects you effortlessly. Find experts in a variety of fields, from web development and graphic design to content writing and more. Join our community and tap into a world of freelance excellence. Welcome to Expertease, where skills meet opportunity.


## Run Locally



Go to the project directory

```bash
  cd expertease
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



