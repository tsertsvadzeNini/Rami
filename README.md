# Epic Movie Quotes

On our website users may sign up, go through authorization (includes email verification),retrive forgotten passwords and purchase product packages all with extra security. We also offer user friendly platform where user can update user name and profile image.

## Table of Contents

-   [Prerequisites](#prerequisites)

-   [Tech Stack](#tech-stack)

-   [Getting Started](#getting-started)

-   [Migrations](#migration)

-   [Development](#development)

## Prerequisites

-   PHP@8.x and up
-   MYSQL@8 and up
-   npm@9.x and up
-   composer@2 and up

## Tech Stack

-   Laravel@10.6.2 - back-end framework
-   Spatie Translatable - package for translation
-   Tailwind3.3.1@up - front-end framework

## Getting Started

clone project from githun repository

```bash
  git https://github.com/RedberryInternship/levan-tchelishvili-epic-movie-quotes-back
```

Run composer install to install dependencies

```bash
  composer install
```

Install JS dependencies

```bash
  npm Install
```

Now we need to set our env file. Go to the root of your project and execute this command.

```bash
cp .env.example .env
```

Update .env file

mysql

`DB_CONNECTION=mysql`

`DB_HOST=127.0.0.1`

`DB_PORT=3306`

`DB_DATABASE=*****`

`DB_USERNAME=*****`

`DB_PASSWORD=*****`

after setting up .env run commands

```bash
 php artisan key:generate
```

Which generates auth key.

```bash
 php artisan storage:link
```


#### Now, you should be good to go!

### Migration

if you've completed getting started section, then migrating database if fairly simple process, just execute:

```bash
php artisan migrate
```

### Development

You can run Laravel's built-in development server by executing:

```bash
php artisan serve
```

when working on JS you may run:

```bash
 npm run dev
```

it builds your js files into executable scripts. If you want to watch files during development, execute instead:

```bash
  npm run watch
```

it will watch JS files and on change it'll rebuild them, so you don't have to manually build them.
