[![portfolio](https://img.shields.io/badge/my_portfolio-000?style=for-the-badge&logo=ko-fi&logoColor=white)](https://main--abderrahmaneamerrhiportfoliov2.netlify.app/)
[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/abderrahmane-amerrhi-807b40201/)

# Quiz App

Quiz app with laravel reactjs that enable admin to manage scholar etablissements grupes teachers and students quiz , Teachers can add new tests and have students pass the tests

## Information

I built the app using laravel and reactjs, made a simple backend and also used api, created apis using laravel and used them in reactjs components

### Technologies used in Backend

| Technology |        Description        | Version |
| :--------- | :-----------------------: | :-----: |
| Php        |       PHP language        | ^8.0.2  |
| Laravel    | Laravel backend framework |  ^9.19  |

### Technologies used in FrontEnd

| Technology |    Description    | Version |
| :--------- | :---------------: | :-----: |
| Reactjs    | Reactjs Framework | ^17.0.2 |

|
⚡️ And other tools used: Visit file package.json

## Cloning and use

```bash or terminal
  # Cloning app
  git clone  https://github.com/AbderrahmaneAmerhhi/DSHOPV2.git

  # install composer
   composer install
   php artisan config:clear
   php artisan config:cache
  # copy .env.example => rename it to .env

  # generate App key
   php artisan key:generate

  # install node_modules
   npm install

```

## Configuration

```env
# in .env file config database

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=yourdatabse_name
DB_USERNAME=root
DB_PASSWORD=databasepassword

```

## Migrate database and run app

```bash or terminal
  ########### open app in terminal or cmd or bash ... ###############
  # Migrate data base run in terminal
   php artisan migrate

  # seed database
   php artisan db:seed

  # run app
  php artisan serve
   ## in other terminal
    npm run dev

  # open app in
  http://127.0.0.1:8000

  # login to admin dashboard
   Url : http://127.0.0.1:8000/admin/login
   Email :   admin@dev.test
   Password : admin

    # login to teacher test account
   Url : http://127.0.0.1:8000/login
   Email :   prof@dev.test
   Password : prof
   # login to student test account
   Url : http://127.0.0.1:8000/login
   Email :  user@dev.test
   Password : user

```

## Features

-   Dynamic backend with laravel Backend framework
-   Responsive front-end and multilanguage and other widgets built using react.js framework

#### Admin Dashboard Features

-   admin can manage scholar etablissements, add new etablissements, update a delete
-   admin can manage scholar etablissements groups, add new groups, update a delete
-   admin can manage Teachers and students quizes

#### Teachers Dashboard Features

-   Teachers can add new quizes

#### Students Dashboard Features

-   students can pass the tests

# Discover

Discover [Vedio](https://abderrahmaneamerrhi.com/assets/QuizAppLaravelReact-veds-02a20a78.mp4).
